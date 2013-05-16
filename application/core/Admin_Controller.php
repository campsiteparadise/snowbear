<?
class Admin_Controller extends MY_Controller
{
	protected $model = '';		//	name of the model
	protected $limit = 25;		// 	default limit for pagination
	protected $offset = 0;		//	default offset for pagination
	protected $field_data;		//	MYSQL/DB meta data for fields
	
	protected $list_commands = array(		//Commands available when in listing/index mode
		'add'=>1,'edit'=>1,'delete'=>1
	);
	
	protected $auto_hide_files = array('id');
	
    public function __construct()
    {
        parent::__construct();
        $this->data['login'] =true;
		$this->data['title'] =array(
		 'site_name'=>$this->config->item('site_title'),
		 'page_title'=>'Admin Panel'
		);
		
		$this->data['is_admin'] = true;
		
		if($this->model!='')
		{
			$this->load->model("{$this->model}model",$this->model);
			$this->data['model_name'] = $model_name = ucwords($this->model);
			array_push($this->data['title'],"{$model_name} Management");
		}
		
		$this->header = $this->load->view('partials/header',$this->data,true);
		$this->footer = $this->load->view('partials/footer',$this->data,true);
		
		$this->options = array(
			'limit'=>$this->limit,
			'offset'=>$this->offset
		);
		
		$this->get_field_info();
		$this->data['field_data'] = $this->field_data;
		$this->data['model'] = $this->model;
    }
    
    public function index()
    {
		$this->data['context_name'] = plural(ucwords($this->model));
		$fn  = "{$this->model}";
		
		if(isset($this->list_commands['add']))
		{
			$add = $this->load->view('admin/add_widget',$this->data,true);
			$this->add_view($add);
		}
		
		$list = $this->data[$this->model] = $this->$fn->get_list($this->options);
		
		$this->data['item_count'] = count($list);
		
		$item_count_panel = $this->load->view('admin/item_count',$this->data,true);
		$this->add_view($item_count_panel);
		
		if(count($list)>0)
		{
			$this->data['list'] = $list;
			$this->data['list_commands'] = $this->list_commands;
			$list_data = $this->load->view('admin/table',$this->data,true);
			$this->add_view($list_data);
		}
		else
		{
			$no_records = $this->load->view('admin/no_records',$this-data,true);
			$this->add_view($no_records);
		}
		
		if(isset($this->list_commands['add']))
		{
			$add = $this->load->view('admin/add_widget',$this->data,true);
			$this->add_view($add);
		}
		
		$this->load_views();
	}
	
	public function edit($id=false)
	{
		$this->load->helper('form');
		$this->load->library('form_validation');
		$this->load->library('auto_form');
		$record = array();
		
		if($id!=false)
		{
			$fn = "{$this->model}";
			$record = $this->$fn->get(array('id'=>$id),true);
		}
		
		$form_data = $this->auto_form->set_fields($record,$this->auto_hide_files,$this->field_data);
		$this->data['form'] = array(
			'control'=>$form_data
		);		
		
		$edit = $this->load->view('admin/edit_widget',$this->data,true);
		$this->add_view($edit);
		
		$this->load_views();
	}
	
	public function delete($id=false)
	{
		echo $id;
	}
	
	public function save()
	{
		echo 'saving';
	}
	
	protected function get_field_info()
	{
		$fn = "{$this->model}";
		$this->field_data = $this->$fn->get_field_data();	
	}
}
