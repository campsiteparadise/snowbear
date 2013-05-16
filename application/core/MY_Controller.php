<?

class MY_Controller extends CI_Controller
{
	protected $views = array();
	protected $header = '';
	protected $footer = '';
	
	function __construct()
	{
	 parent::__construct();
	}
	
	protected function load_views()
	{
		$viewData = $this->header;;
		
		if(count($this->views)>0)
		{
			foreach($this->views as $view)
			{
				$viewData.=$view;
			}
		}
		$viewData.=$this->footer;
		
		$this->load->view('template',array('data'=>$viewData));
	}
	
	protected function add_view($data)
	{
		$this->views[count($this->views)] = $data;
	}
	
	
}
