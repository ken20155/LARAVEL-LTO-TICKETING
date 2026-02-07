<?php 
namespace App\Http\Controllers\Components\TicketTransactions;
use App\Models\MainModel;
use App\Http\Controllers\Helpers\Helpers;
use Illuminate\Support\Facades\Hash;
class TicketTransactions 
{
    function __construct() {
        $this->model = new MainModel();
        $this->module = Helpers::last_segment();
        $this->session = Helpers::session();
        Helpers::getView('TicketTransactions');
    }
    public static function js(){
        return [
            'js/sample'
        ];
    }
    public function defaultPage($params){
        $data = [];
        $sql = 'SELECT * FROM tbl_users WHERE user_role = 2';
        $param = [];
        $d['res'] = $this->model->getResults($sql, $param);
        return [
            'data' => $d,
        ];
    }
    public function viewDataUser(){
        $post = Helpers::post();
        extract($post);
        $sql = 'SELECT * FROM tbl_users WHERE user_id = ?';
        $param = [$id];
        $row =  $this->model->getRow($sql, $param);
        $d['data'] = $row;
        return [
            'action' => 'Edit',
            'body' =>  view('modal-content.view', $d)->render(),
            'footer' =>  '<button type="submit" class="btn btn-primary btn-sm">Save</button>',
        ];
    }
    public function addNewUser(){
        $post = Helpers::post();
        extract($post);
        $d['data'] = false;
        return [
            'action' => 'Add New',
            'body' =>  view('modal-content.view', $d)->render(),
            'footer' =>  '<button type="submit" class="btn btn-primary btn-sm">Save</button>',
        ];
    }
    public function crudAction(){
        $post = Helpers::post();
        if ($post['action'] == 'add') {
            return $this->createUser($post);
        }else{
            return $this->updateUser($post);
        }
    }
    public function createUser($post){
        extract($post);
        $sql = 'SELECT * FROM tbl_users WHERE username = ?';
        $param = [$username];
        $result =  $this->model->getRow($sql, $param);
        if ($result) {
            $response['success'] = false;
            $response['exist'] = true;
            $response['msg'] = 'Username already exist';
        }else{
            $data['first_name'] = $first_name;
            $data['middle_name'] = $middle_name;
            $data['last_name'] = $last_name;
            $data['bday'] = $bday;
            $data['email'] = $email;
            $data['phone_number'] = $phone_number;
            $data['address'] = $address;
            $data['gender'] = $gender;
            $data['username'] = $username;
            $data['password'] = Hash::make($password);
            $res = $this->model->insert('tbl_users', $data);
            if ($res) {
                $response['success'] = true;
                $response['exist'] = false;
                $response['msg'] = 'Successfully Added!';
            }
        }
        return $response;
    }
    public function updateUser($post){
        extract($post);
        $data['first_name'] = $first_name;
        $data['middle_name'] = $middle_name;
        $data['last_name'] = $last_name;
        $data['bday'] = $bday;
        $data['email'] = $email;
        $data['phone_number'] = $phone_number;
        $data['address'] = $address;
        $data['gender'] = $gender;
        $data['username'] = $username;
        if (isset($password) && $password != null && $password != '') {
            $data['password'] = Hash::make($password);
        }
        $where = [
            ['field' => 'user_id','value'=> $user_id]
        ];
        $res = $this->model->updateWhere('tbl_users', $where, $data);
        if ($res) {
            $response['success'] = true;
            $response['exist'] = false;
            $response['msg'] = 'Successfully Updated!';
        }
        return $response;
    }
    public function deleteDataUser(){
        $post = Helpers::post();
        $data['deleted'] = 1;
        $where = [
            ['field' => 'ticket_id','value'=> $post['id']]
        ];
        $res = $this->model->updateWhere('tickets', $where, $data);
        if ($res) {
            $response['success'] = true;
            $response['msg'] = 'Deleted Successfully';
        }else{
            $response['success'] = false;
            $response['msg'] = 'Error';
        }
        return response()->json($response);
    }
    public function acceptDataUser(){
        $post = Helpers::post();
        $data['status'] = 'Paid';
        $data['or_no'] = $post['value'];
        $where = [
            ['field' => 'ticket_id','value'=> $post['id']]
        ];
        $res = $this->model->updateWhere('tickets', $where, $data);
        if ($res) {
            $response['success'] = true;
            $response['msg'] = 'Paid Successfully';
        }else{
            $response['success'] = false;
            $response['msg'] = 'Error';
        }
        return response()->json($response);
    }
    public function listUsers(){
        $post = Helpers::post();
        $where_ext = '';
        if (isset($post['status']) && $post['status'] != 'All') {
            $where_ext .= ' and a.status = "'.$post['status'].'"';
        }
        if (isset($post['user_id'])) {
            $where_ext .= ' and a.added_by = '.$post['user_id'].'';
        }
        if (isset($post['start']) && isset($post['end'])) {
            $where_ext .= ' and DATE(a.added_date) between "'.$post['start'].'" and "'.$post['end'].'"';
        }
        $sql = "SELECT a.*,concat(b.first_name,' ',b.middle_name,' ',b.last_name) as added_by_name FROM tickets as a inner join tbl_users as b on a.added_by = b.user_id WHERE a.deleted = 0 and (DATEDIFF(CURDATE(), a.added_date) <= 3 OR a.`status` = 'Paid') $where_ext ORDER BY a.added_date DESC";
        //dd($sql);
        $result =  $this->model->getResults($sql, []);  
        $data = [];
        $x = 1;
        if ($result) {
            $base_url = env('APP_URL');
            foreach ($result as $key => $R) {
                $crdentials = '
                                 data-id = "'.$R->ticket_id.'"
                                 data-validid = "'.$base_url.'public/main/uploaded/valid-id/'.$R->files.'"
                             ';
                    $btn_view = '<button
                    class="flex items-center justify-between px-2 py-2 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-blue-600 border border-transparent rounded-full active:bg-blue-600 hover:bg-blue-700 focus:outline-none focus:shadow-outline-blue"
                    aria-label="Check"
                    '.$crdentials.'
                    id="viewData"
                >
                            <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person-vcard-fill" viewBox="0 0 16 16">
                            <path d="M0 4a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v8a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2zm9 1.5a.5.5 0 0 0 .5.5h4a.5.5 0 0 0 0-1h-4a.5.5 0 0 0-.5.5M9 8a.5.5 0 0 0 .5.5h4a.5.5 0 0 0 0-1h-4A.5.5 0 0 0 9 8m1 2.5a.5.5 0 0 0 .5.5h3a.5.5 0 0 0 0-1h-3a.5.5 0 0 0-.5.5m-1 2C9 10.567 7.21 9 5 9c-2.086 0-3.8 1.398-3.984 3.181A1 1 0 0 0 2 13h6.96q.04-.245.04-.5M7 6a2 2 0 1 0-4 0 2 2 0 0 0 4 0"/>
                            </svg>

                </button>';
                $btn_pending = '<button
                class="flex items-center justify-between px-2 py-2 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-teal-600 border border-transparent rounded-full active:bg-teal-600 hover:bg-teal-700 focus:outline-none focus:shadow-outline-teal"
                aria-label="Check"
                '.$crdentials.'
                id="acceptData"
            >
                <svg
                    class="w-5 h-5"
                    aria-hidden="true"
                    fill="currentColor"
                    viewBox="0 0 20 20"
                >
                    <path
                        fill-rule="evenodd"
                        d="M16.707 5.293a1 1 0 00-1.414 0L8 12.586 4.707 9.293a1 1 0 00-1.414 1.414l4 4a1 1 0 001.414 0l8-8a1 1 0 000-1.414z"
                        clip-rule="evenodd"
                    ></path>
                </svg>
            </button>';


             $btn_paid = '<button
                         class="flex items-center justify-between px-2 py-2 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-red-600 border border-transparent rounded-full active:bg-red-600 hover:bg-red-700 focus:outline-none focus:shadow-outline-red"
                         aria-label="Edit"
                         id="deleteData"
                         '.$crdentials.'
                         >
                         <svg
                             class="w-5 h-5"
                             aria-hidden="true"
                             fill="currentColor"
                             viewBox="0 0 20 20"
                         >
                             <path
                             fill-rule="evenodd"
                             d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z"
                             clip-rule="evenodd"
                           ></path>
                         </svg>
                         </button>';

                $btn_view_print = '
                                   <button class="flex items-center justify-between px-2 py-2 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-teal-600 border border-transparent rounded-full active:bg-teal-600 hover:bg-teal-700 focus:outline-none focus:shadow-outline-teal" aria-label="Edit" '.$crdentials.' id="printTicket">
                      <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-eye" viewBox="0 0 16 16">
                        <path d="M16 8s-3-5.5-8-5.5S0 8 0 8s3 5.5 8 5.5S16 8 16 8M1.173 8a13 13 0 0 1 1.66-2.043C4.12 4.668 5.88 3.5 8 3.5s3.879 1.168 5.168 2.457A13 13 0 0 1 14.828 8q-.086.13-.195.288c-.335.48-.83 1.12-1.465 1.755C11.879 11.332 10.119 12.5 8 12.5s-3.879-1.168-5.168-2.457A13 13 0 0 1 1.172 8z"/>
                        <path d="M8 5.5a2.5 2.5 0 1 0 0 5 2.5 2.5 0 0 0 0-5M4.5 8a3.5 3.5 0 1 1 7 0 3.5 3.5 0 0 1-7 0"/>
                      </svg>
                                    

                                    </button>
                                                                
                                    
                                </div>
                    </div>
                
                ';
                if ($R->status == 'Pending') {
                $status = '
                <span class="px-2 py-1 font-semibold leading-tight text-orange-700 bg-orange-100 rounded-full dark:text-white dark:bg-orange-600">
                    Pending
                </span>
                ';
                $my_btn = $btn_view.$btn_pending.$btn_view_print;
                }else{
                    $my_btn = $btn_view.$btn_view_print;
                    $status = '<span
                    class="px-2 py-1 font-semibold leading-tight text-green-700 bg-green-100 rounded-full dark:bg-green-700 dark:text-green-100"
                    >
                    Paid
                    </span>';
                }   
         
                $price = [];
                $vi = json_decode($R->violation_desc,true);
                $desc = '';
                foreach ($vi as $key => $V) {
                    $desc .= '-'.$V['desc'].' - ₱'.number_format($V['price']).'</br>';
                    $price[] = $V['price'];
                }
                $data[] = [
                 '#' => $x++,
                 'or_no' => $R->or_no,
                 'ticket_no' => $R->ticket_no,
                 'full_name' => $R->full_name,
                 'vio_desc' => $desc,
                 'total_vio' => '₱ '.number_format(array_sum($price),2),
                 'address' => $R->address,
                 'added_by' => $R->added_by_name,
                 'added_date' => date(LONGDATETIME,strtotime($R->added_date)),
                 'status' => $status,
                 'action' => '<div class="flex items-center space-x-4 text-sm">'.$my_btn.'</div>',
                ];
             }
        }
        return Helpers::generateDataTable($data);
    }
    public function acceptUser(){
        $post = Helpers::post();
        
        extract($post);
        $sql = 'SELECT * FROM tbl_users WHERE user_id = ?';
        $param = [$id];
        $row =  $this->model->getRow($sql, $param);
        $full_name =  $row->first_name.' '.$row->middle_name.' '.$row->last_name;
        $data['to_email'] = $row->email;
        $data['to_full_name'] = $full_name;
        $data['subject'] = 'Message From DTI Negosyo Center';
        $data['msg'] = 'Hello '.$full_name.', Your Application has been Accepted you can now login your account. Please click the link <a href="'.env('APP_URL').'auth/view/sign-in">Click me!</a>';
        $mail = Helpers::emailSender($data);
        if ($mail['success']) {
            $response['msg'] = $full_name.' application has been accepted successfully!';
            $response['success'] = true;
            $res['status'] = 'ACCEPTED';
            $res['id'] = $id;
            $this->updateStatus($res);
            return response()->json($response);
        }else{
            return $mail;
        }
    }
    public function declineUser(){
        $post = Helpers::post();
        extract($post);
        $sql = 'SELECT * FROM tbl_users WHERE user_id = ?';
        $param = [$id];
        $row =  $this->model->getRow($sql, $param);
        $full_name =  $row->first_name.' '.$row->middle_name.' '.$row->last_name;
        $data['to_email'] = $row->email;
        $data['to_full_name'] = $full_name;
        $data['subject'] = 'Message From DTI Negosyo Center';
        $data['msg'] = 'Hello '.$full_name.', Your Application has been declined';
        $mail = Helpers::emailSender($data);
        if ($mail['success']) {
            $response['msg'] = $full_name.' application has been declined successfully!';
            $response['success'] = true;
            $res['status'] = 'DECLINED';
            $res['id'] = $id;
            $this->updateStatus($res);
            return response()->json($response);
        }else{
            return $mail;
        }
    }
    public function updateStatus($res){
        $data['status'] = $res['status'];
        $where = [
            ['field' => 'user_id','value'=> $res['id']]
        ];
        $this->model->updateWhere('tbl_users', $where, $data);
    }
    public function printPreviewTicket(){
        $post = Helpers::post();
        extract($post);
        $sql = 'SELECT t.*,u.first_name,u.middle_name,u.last_name FROM tickets as t INNER JOIN tbl_users as u on t.added_by = u.user_id WHERE t.ticket_id = ?';
        $param = [$id];
        $row =  $this->model->getRow($sql, $param);
        $d['data'] = $row;
        $btn = '';
        $session = $this->session;

        if ($session['session']['user_role'] == 2) {
            $btn = '
        
            <button
              type="button"
              id="printNowTicket"
               class="w-full px-5 py-3 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-lg sm:w-auto sm:px-4 sm:py-2 active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple"
             >
               Print
             </button>
         ';
        }

        return [
            'action' => 'Print Preview',
            'body' =>  view('modal-content.preview-ticket', $d)->render(),
            'footer' =>  $btn,
        ];
    }
}