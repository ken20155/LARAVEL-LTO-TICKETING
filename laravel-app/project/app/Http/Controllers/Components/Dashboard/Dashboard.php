<?php 
namespace App\Http\Controllers\Components\Dashboard;
use App\Models\MainModel;
use App\Http\Controllers\Helpers\Helpers;

class Dashboard
{
    function __construct() {
        $this->model = new MainModel();
        $this->module = Helpers::last_segment();
        $this->session = Helpers::session();
        Helpers::getView('Dashboard');
    }
    public static function js(){
        return [
            'js/sample'
        ];
    }
    public function defaultPage($params){
        $data = [];
        $session = $this->session;
        if ($session['session']['user_role'] == 1) {
            $d['res'] = $this->model->getResults("SELECT * FROM tickets WHERE `status` = 'Paid' ORDER BY full_name ASC",[]);
            $d['total_vio'] = $this->model->getRow('SELECT COUNT(*) as total_vio FROM tickets',[]);
            $d['pending_total'] = $this->model->getRow('SELECT COUNT(*) as total FROM tickets WHERE `status` = ?',['Pending']);
            $d['total_violators'] = $this->model->getRow('SELECT COUNT(*) as total_violators FROM tbl_users WHERE user_role = 2',[]);
           $page = 'admin';
        }else{
            $d = [];
            $page = 'user';
        }
        return [
            'page' => view($page.'.view', $d)->render()
        ];
    }
    public function addNewUser(){
        $post = Helpers::post();
        extract($post);
        $d['data'] = false;
        $d['res'] = $this->model->getResults('SELECT * FROM violation WHERE deleted = ?',[0]);
        $d['existing_tickets'] = $this->model->getResults('SELECT MIN(ticket_id) AS ticket_id,full_name FROM tickets GROUP BY full_name ORDER BY full_name DESC',[]);
        return [
            'action' => 'Add New',
            'body' =>  view('modal-content.view', $d)->render(),
            'footer' =>  '
            <button
             type="submit"
              class="w-full px-5 py-3 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-lg sm:w-auto sm:px-4 sm:py-2 active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple"
            >
              Save & Print
            </button>
            ',
        ];
    }
    public function crudAction(){
        $post = Helpers::allr();
        if ($post['action'] == 'add') {
            return $this->createDocument($post);
        }else{
            return $this->updateDocument($post);
        }
    }
    public function createDocument($post){
        extract($post);
        //dd($post);
        $session = $this->session;
        
        $violation_name = $this->model->getResults('SELECT * FROM violation WHERE violation_id in ('.implode(',',$violations).')',[]);
        $vi = [];
        foreach ($violation_name as $key => $R) {
            $vi[] = [
                'id' => $R->violation_id,
                'desc' => $R->violation_desc,
                'price' => $R->violation_price,
            ];
        }
        $data['violation_desc'] = json_encode($vi);
        $data['ticket_no'] = strtotime(date(SQLDATETIME));
        $data['full_name'] = $full_name;
        $data['plate_no'] = $plate_no;
        $data['vehicle_type'] = $vehicle_type;
        $data['valid_id'] = $valid_id;
        $data['valid_id_no'] = $valid_id_no;
        // $data['last_name'] = $last_name;
        // $data['middle_name'] = $middle_name;
        $data['address'] = $address;
        $data['added_by'] = $session['session']['user_role'];
        $data['added_date'] = date(SQLDATETIME);
        if (isset($upload_file)) {
            $folder_name = Helpers::strRandom(10);
            $data['files'] = $folder_name.'/'.$this->uploadFileLoan($folder_name,$upload_file);
        }
        $res = $this->model->insert('tickets', $data);
        if ($res) {
            $response['success'] = true;
            $response['id'] = $res['id'];
            $response['msg'] = 'Successfully Added!';
        }else{
            $response['success'] = false;
        }
        return $response;
    }
    public function updateDocument($post){
        extract($post);
        $session = $this->session;
        
        $violation_name = $this->model->getResults('SELECT * FROM violation WHERE violation_id in ('.implode(',',$violations).')',[]);
        $vi = [];
        foreach ($violation_name as $key => $R) {
            $vi[] = [
                'id' => $R->violation_id,
                'desc' => $R->violation_desc,
                'price' => $R->violation_price,
            ];
        }
        $data['violation_desc'] = json_encode($vi);

        $data['full_name'] = $full_name;
        $data['plate_no'] = $plate_no;
        $data['vehicle_type'] = $vehicle_type;
        $data['address'] = $address;
        $data['valid_id'] = $valid_id;
        $data['valid_id_no'] = $valid_id_no;

        if (isset($upload_file)) {
            $folder_name = Helpers::strRandom(10);
            $data['files'] = $folder_name.'/'.$this->uploadFileLoan($folder_name,$upload_file);
        }
        $where = [
            ['field' => 'ticket_id','value'=> $ticket_id]
        ];
        $res = $this->model->updateWhere('tickets', $where, $data);
        if ($res) {
            $response['success'] = true;
            $response['exist'] = false;
            $response['id'] = $ticket_id;
            $response['msg'] = 'Successfully Updated!';
        }
        return $response;
    }
    public function uploadFileLoan($folder_name,$file_upload){
        $path = Helpers::getDir('valid-id', $folder_name);
        $filename = Helpers::strRandom(10) . '-' . Helpers::strRandom(10) . '.' . $file_upload->extension();
        $file_upload->move($path, $filename);
        return $filename;
    }
    public function ticketList(){
        $post = Helpers::post();
        extract($post);
        //dd($post);
        $where = '';
        if ($selectStatus != 'All') {
            $where .= " and `status` = '$selectStatus'";
        }
        if (isset($post['start']) && isset($post['end'])) {
            $where .= ' and DATE(added_date) between "'.$post['start'].'" and "'.$post['end'].'"';
        }
        if ($search_name != null) {
            $where .= " and full_name LIKE '%$search_name%'";
        }
        $session = $this->session;
        $d['res'] = $this->model->getResults("SELECT * FROM tickets WHERE deleted = 0 $where ORDER BY added_date DESC",[]);
        // $d['res'] = $this->model->getResults("SELECT * FROM tickets WHERE added_by = ? and deleted = 0 $where ORDER BY added_date DESC",[$session['session']['user_role']]);
        
        $d['html'] = view('user.tickets', $d)->render();

        return $d;
    }
    public function viewDataUser(){
        $post = Helpers::post();
        extract($post);
        $sql = 'SELECT * FROM tickets WHERE ticket_id = ?';
        $param = [$id];
        $row =  $this->model->getRow($sql, $param);
        $d['data'] = $row;
        $d['res'] = $this->model->getResults('SELECT * FROM violation WHERE deleted = ?',[0]);
        $d['existing_tickets'] = $this->model->getResults('SELECT MIN(ticket_id) AS ticket_id,full_name FROM tickets GROUP BY full_name ORDER BY full_name DESC',[]);
        $d['ticket_again'] = isset($ticket_again) ? true : false;
        return [
            'action' => 'Edit',
            'valid_id_img' =>  '<img class="img-fluid" src="'.env('APP_URL').'public/main/uploaded/valid-id/'.$d['data']->files.'">',
            'body' =>  view('modal-content.view', $d)->render(),
            'footer' =>  '
            <button
              id="closeModal"
              type="button"
              class="w-full px-5 py-3 text-sm font-medium leading-5 text-white text-gray-700 transition-colors duration-150 border border-gray-300 rounded-lg dark:text-gray-400 sm:px-4 sm:py-2 sm:w-auto active:bg-transparent hover:border-gray-500 focus:border-gray-500 active:text-gray-500 focus:outline-none focus:shadow-outline-gray"
            >
              Cancel
            </button>
            <button
             type="submit"
              class="w-full px-5 py-3 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-lg sm:w-auto sm:px-4 sm:py-2 active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple"
            >
              Save & Print
            </button>
            ',
        ];
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
            'body' =>  view('user.preview-ticket', $d)->render(),
            'footer' =>  $btn,
        ];
    }
    public function pieChart(){
        $post = Helpers::post();
        extract($post);
        $row =  $this->model->getRow('SELECT COUNT(*) as unpaid FROM tickets WHERE `status` = ?', ['Pending']);
        $row2 =  $this->model->getRow('SELECT COUNT(*) as paid FROM tickets WHERE `status` = ?', ['Paid']);
        return [
            'data'=>[$row->unpaid,$row2->paid],
            'labels'=>['Unpaid','Paid'],
        ];
    }
    public function lineChart(){
        
        $d['data_pending'] = $this->unpaidCollectionMonhtly();
        $d['data_paid'] = $this->paidCollectionMonhtly();
        return $d;    
    }
    public function unpaidCollectionMonhtly(){
        $post = Helpers::post();
        extract($post);
        $wherein = '';
        if (isset($year) && $year != '') {
            $wherein .= " AND YEAR(a.added_date) = '".$year."'";
        }
        
        $sql = "SELECT 
                    MONTH(a.added_date) AS month,
                    COUNT(*) AS total_count
                FROM 
                    tickets AS a
                WHERE 
                    a.deleted = 0 and a.`status` = ?
                    $wherein
                GROUP BY 
                    MONTH(a.added_date)
                ORDER BY 
                    MONTH(a.added_date)";
        $res =  $this->model->getResults($sql, ['Pending']); 
        $month_value = [];
        if ($res) {
            $data_value = [];
            foreach ($res as $key => $R) {
                $data_value[$R->month] = $R->total_count;
            }
            $months = [1,2,3,4,5,6,7,8,9,10,11,12];
            foreach ($months as $key => $month) {
                if (isset($data_value[$month])) {
                    $month_value[] = $data_value[$month];
                }else{
                    $month_value[] = 0;
                }
            }
        }
        return $month_value;
    }
    public function paidCollectionMonhtly(){
        $post = Helpers::post();
        extract($post);
        $wherein = '';
        if (isset($year) && $year != '') {
            $wherein .= " AND YEAR(a.added_date) = '".$year."'";
        }
        
        $sql = "SELECT 
                    MONTH(a.added_date) AS month,
                    COUNT(*) AS total_count
                FROM 
                    tickets AS a
                WHERE 
                    a.deleted = 0 and a.`status` = ?
                    $wherein
                GROUP BY 
                    MONTH(a.added_date)
                ORDER BY 
                    MONTH(a.added_date)";
        $res =  $this->model->getResults($sql, ['Paid']); 
        $month_value = [];
        if ($res) {
            $data_value = [];
            foreach ($res as $key => $R) {
                $data_value[$R->month] = $R->total_count;
            }
            $months = [1,2,3,4,5,6,7,8,9,10,11,12];
            foreach ($months as $key => $month) {
                if (isset($data_value[$month])) {
                    $month_value[] = $data_value[$month];
                }else{
                    $month_value[] = 0;
                }
            }
        }
        return $month_value;
    }
    public function autoFillNow(){
        $post = Helpers::post();
        extract($post);
        return [
            // 'data'=>[$row->unpaid,$row2->paid],
            // 'labels'=>['Unpaid','Paid'],
        ];
    }
    
}