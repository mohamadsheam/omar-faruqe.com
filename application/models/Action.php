<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Action extends My_Model {

	function __construct(){
		parent::__construct();
	}


	// save into database
    public function add($table, $data) {
        $this->db->insert($table, $data);
        return true;
    }

    // read from database
    public function read($table, $where=array(), $order='id', $order_by='ASC'){

        $this->db->where($where);
		$this->db->order_by($order, $order_by);
        $query = $this->db->get($table);
        return $query->result();

    }

    // update table data
    public function update($table, $data, $where= array()){
        $this->db->set($data);
        $this->db->where($where);
        $this->db->update($table);
        return true;
    }


    // delete data
    public function delete($table, $where=array()){
        $this->db->where($where);
        $this->db->delete($table);
        return true;
    }


    // check exist
    public function existance($table, $where=array()){
		$this->db->where($where);
        $query = $this->db->get($table);
        $records = $query->result();
		if($records){
			return TRUE;
		}
		return FALSE;
    }

    //save data into db and return auto increment ID
    public function addAndGetID($table, $data){
        $this->db->insert($table,$data);
        $insert_id = $this->db->insert_id();
        return  $insert_id;
    }


    // read from database using two table
    public function joinAndRead($from, $join, $joinCond, $where=array()){
        $this->db->select('*');
        $this->db->from($from);
        $this->db->join($join, $joinCond);
        $this->db->where($where);
        $query = $this->db->get();
		return $query->result();
    }

	// multiJoinRead example
	/*
	$where = array(
        'status_id' => 2,
    );

    $cols = 'events.id as event_id, events.reoccurrence , events.event_title';

    $order_col = 'events_date.events_table_id';
    $order_type = 'ASC';

    $params = array(
        'from'         => 'events_date',
        'order_col'    => 'events_date.events_table_id',
        'cols'         => $cols,
        'order_type'   => 'ASC',
        'group_by'     => ['events_date.event_date','events_date.events_table_id'],
    );

    $joindetails = array(
        'events_sub_id' => array(
            'condition' => 'events_sub_id.events_id=events_date.events_table_id',
            //'type' => 'left'
        ),
		...
    );

	*/

	/**
	 * Read data from multiple table
	 * @param array $params =>
	 * :from = 'main table name';
	 * :order_col = 'order by col name';
	 * :order_type = 'ASC or DESC';
	 * :cols = $table_cols_name;
	 * :group_by = 'table col name or array of col name';
	 *
	 * @param array $details(multi-dimensional array) =>
	 * :table name => array('condition' => 'join condition here'),
	 *
	 * @param  array  $where table condtion
	 * @return object dataset
	 */
	public function multiJoinRead($params, $details, $where=array()){
        $this->db->select($params['cols']);
        $this->db->from($params['from']);

        // check type exists or not
        foreach ($details as $key => $val) {
            if(array_key_exists("type", $val)){
                $this->db->join($key, $val["condition"], $val["type"]);
            } else {
                $this->db->join($key, $val["condition"]);
            }
        }
        $this->db->where($where);
        if(array_key_exists('group_by', $params) ){
            $this->db->group_by($params['group_by']);
        }
        //$this->db->where($where);
        if( array_key_exists('order_col', $params) && array_key_exists('order_type', $params)){
            $this->db->order_by($params['order_col'], $params['order_type']);
        }
        if( array_key_exists('group_by', $params)){
            $this->db->group_by($params['group_by']);
        }
        $query = $this->db->get();
        return $query->result();
    }

    // read limit
    public function read_limit($table, $where=array(), $order='id', $order_by='DESC', $limit=1){
        $this->db->where($where);
        $this->db->order_by($order, $order_by);
        $this->db->limit($limit);
        $query = $this->db->get($table);
        return $query->result();
    }

    // read sum of a column
    public function read_sum($table, $col, $where=array()){
        $this->db->select_sum($col);
        $this->db->from($table);
        $this->db->where($where);

        $query = $this->db->get();
        $result = $query->result();
		return $result[0]->$col != NULL ? $result[0]->$col:0.0;
    }

    public function readGroupBy($table, $groupBy, $where=array(), $orderBy="id", $sort="desc"){
        $this->db->select('*');
        $this->db->group_by($groupBy);
        $this->db->order_by($orderBy, $sort);
        $this->db->where($where);
        $query = $this->db->get($table);

        return $query->result();
    }

	/**
	 * Read speclific columns from database table
	 * @param  string $cols                [table column name separated by comma]
	 * @param  string $table               table name
	 * @param  array $where               condition
	 * @return object dataset
	 */
	public function readCols($cols, $table, $where){
		$this->db->select($cols);
        $this->db->where($where);
        $query = $this->db->get($table);

        return $query->result();
	}


	/**
	 * Read speclific columns from database table
	 * @param  string $cols                [table column name separated by comma]
	 * @param  string $table               table name
	 * @param  array $where               condition
	 * @param  array $where_in             array('col' => table column, 'values' => [values])
	 * @return object dataset
	 */
	public function readColsWhereIn($cols, $table, $where, $where_in=null){
		$this->db->select($cols);
        $this->db->where($where);
		if ($where_in != null) {
			$this->db->where_in($where_in['col'], $where_in['values']);
		}
        $query = $this->db->get($table);

        return $query->result();
	}



	public function lateFineModel($params){
		$sql="SELECT (SELECT COUNT(*) FROM attendance_record WHERE late_status=1 AND attendance_record.attendance_info_id=attendance_info.id) * (SELECT late_fine from setting_balance) as late_fine
		FROM attendance_info
		JOIN attendance_record on attendance_record.attendance_info_id=attendance_info.id
		WHERE month='".$params['month']."' and year=".$params['year']." AND emp_id='".$params['emp_id']."' GROUP BY emp_id";

		$query = $this->db->query($sql);
		$result = $query->result();
		if($result){
			return $result[0]->late_fine;
		}
		return 0;
	}


	public function checkLeaveRecords($emp_id, $start_date, $end_date){
		$sql = "SELECT * FROM `leave_info` WHERE `emp_id`='".$emp_id."' AND ( ( `start_date` BETWEEN '".$start_date."' AND '".$end_date."') OR (`end_date` BETWEEN '".$start_date."' AND '".$end_date."') )";
		$query = $this->db->query($sql);
		$result = $query->result();
		if(count($result) > 0){
			return true;
		}
		return false;

	}


    public function visitors_chart_data(){
        $sql = "SELECT `browser`, COUNT(*) AS `num` FROM `visitors` GROUP BY `browser`;";
        $query = $this->db->query($sql);
        $result = $query->result();
        return $result;

    }




}

/* End of file action.php */
/* Location: ./application/models/action.php */
