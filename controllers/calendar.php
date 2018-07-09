<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/*session_start();*/
class Calendar extends CI_Controller {

   function __construct()
	{
		parent::__construct();
		$this->load->helper(array('form', 'url'));
         $this->load->model('f_model');       
	}
    
	public function index()
	{
         $this->load->helper('url');
            $session_data = $this->session->userdata('logged_in');
      $data['id'] = $session_data['id'];
        $data['name'] = $session_data['name'];
       
     $data['campaign']=$this->f_model->get_all_campaigns();
          $data['users']=$this->f_model->get_all_users();              
    
    	$this->load->view('templates/header',$data);
		$this->load->view('pages/calendar',$data);
		$this->load->view('templates/footer');
         
        
	}
     
    /********************* PROPERTY ********************/  
    private $dayLabels = array("Monday","Tuesday","Wednesday","Thursday","Friday","Saturday","Sunday");
     
    private $currentYear=0;
     
    private $currentMonth=0;
     
    private $currentDay=0;
     
    private $currentDate=null;
     
    private $daysInMonth=0;
     
    private $naviHref= null;
     
    /********************* PUBLIC **********************/  
        
    /**
    * print out the calendar
    */
    public function show() {
        $year  = null;
         
        $month = null;
         
        if(null==$year&&isset($_GET['year'])){
 
            $year = $_GET['year'];
         
        }else if(null==$year){
 
            $year = date("Y",time());  
         
        }          
         
        if(null==$month&&isset($_GET['month'])){
 
            $month = $_GET['month'];
         
        }else if(null==$month){
 
            $month = date("m",time());
         
        }                  
         
        $this->currentYear=$year;
         
        $this->currentMonth=$month;
         
        $this->daysInMonth=$this->_daysInMonth($month,$year);  
         
        $content='<div class="calendar is-large">'.        
                           '<div class="calendar-container"><div class="calendar-header">'.
                  $this->_createLabels().
            '</div></div><div class="calendar-body">';
                                $weeksInMonth = $this->_weeksInMonth($month,$year);
                                 for( $i=0; $i<$weeksInMonth; $i++ ){
                                     //Create days in a week
                                    for($j=1;$j<=7;$j++){
                                         $content.=$this->_showDay($i*7+$j);
                                    }
                                }
            '</div></div>';
        return $content;   
    }
     
    /********************* PRIVATE **********************/ 
    /**
    * create the li element for ul
    */
    private function _showDay($cellNumber){
        if($this->currentDay==0){
             
            $firstDayOfTheWeek = date('N',strtotime($this->currentYear.'-'.$this->currentMonth.'-01'));
                     
            if(intval($cellNumber) == intval($firstDayOfTheWeek)){
                 
                $this->currentDay=1;
                 
            }
        }
         
        if( ($this->currentDay!=0)&&($this->currentDay<=$this->daysInMonth) ){
             
            $this->currentDate = date('Y-m-d',strtotime($this->currentYear.'-'.$this->currentMonth.'-'.($this->currentDay)));
             
            $cellContent = $this->currentDay;
             
            $this->currentDay++;   
             
        }else{
             
            $this->currentDate =null;
 
            $cellContent=null;
        }
            $d = $this->currentYear.'-'.$this->currentMonth.'-'.$cellContent;
            $d2 = $this->currentMonth.'/'.$cellContent.'/'.$this->currentYear;
             $is_today = "".date("d");
          $events = $this->f_model->get_calendar_task($d);
       
        if(($this->currentDay-1) == date("d"))
        {
            $is_today = "is-today is-active ".date("d");
        }
        $countEvents = 0;
        if(count($events) == 0)
        {
            $countEvents ="";
        }
        else
        {
            $countEvents = count($events);
        }
         //'.($cellNumber%7==1?' start ':($cellNumber%7==0?' end ':' ')).                ($cellContent==null?'mask':'').'
        $content = '<div class="calendar-date ">'.
    '<a class="date-item '.$is_today.'" onclick="getDate(\''.$d.'\')" >'.$cellContent.'</a>'.
        '<div class="calendar-events">';
             foreach ($events as $event)
             {
        $content.='<a href='.base_url().'index.php/tasks/task/'.$event["id"].' class="calendar-event is-primary tooltip" data-tooltip="Tooltip Text">'.$event["task"].'</a>';
             }            
        $content.='</div></div>';
        return $content;
    } 
     
    /**
    * create navigation
    */
    public function _createNavi(){
         
        $nextMonth = $this->currentMonth==12?1:intval($this->currentMonth)+1;
         
        $nextYear = $this->currentMonth==12?intval($this->currentYear)+1:$this->currentYear;
         
        $preMonth = $this->currentMonth==1?12:intval($this->currentMonth)-1;
         
        $preYear = $this->currentMonth==1?intval($this->currentYear)-1:$this->currentYear;
         
        return
            '<div class="card">'.
  '<header class="card-header">'. 
  '</header>'.
            '<div class="card-content">'.
    '<div class="content">'.
       '<h1 class="title is-1 has-text-weight-light">'
           .date('M',strtotime($this->currentYear.'-'.$this->currentMonth.'-1')). 
        '</h1>'.
    '</div>'.
  '</div>'.
   '<footer class="card-footer">'.
    '<a href="'.$this->naviHref.'?month='.sprintf('%02d',$preMonth).'&year='.$preYear.'" class="card-footer-item">Previous</a>'.
    '<a href="'.$this->naviHref.'?month='.sprintf("%02d", $nextMonth).'&year='.$nextYear.'" class="card-footer-item">Next</a>'.
  '</footer>'.
'</div>';
          
    }
         
    /**
    * create calendar week labels
    */
    private function _createLabels(){  
                 //'.($label==6?'end title':'start title').' title
        $content='';
         
        foreach($this->dayLabels as $index=>$label){
             
            $content.='<div class="calendar-date">'.$label.'</div>';
 
        }
         
        return $content;
    }
      
    /**
    * calculate number of weeks in a particular month
    */
    private function _weeksInMonth($month=null,$year=null){
         
        if( null==($year) ) {
            $year =  date("Y",time()); 
        }
         
        if(null==($month)) {
            $month = date("m",time());
        }
         
        // find number of days in this month
        $daysInMonths = $this->_daysInMonth($month,$year);
         
        $numOfweeks = ($daysInMonths%7==0?0:1) + intval($daysInMonths/7);
         
        $monthEndingDay= date('N',strtotime($year.'-'.$month.'-'.$daysInMonths));
         
        $monthStartDay = date('N',strtotime($year.'-'.$month.'-01'));
         
        if($monthEndingDay<$monthStartDay){
             
            $numOfweeks++;
         
        }
         
        return $numOfweeks;
    }
 
    /**
    * calculate number of days in a particular month
    */
    private function _daysInMonth($month=null,$year=null){
         
        if(null==($year))
            $year =  date("Y",time()); 
 
        if(null==($month))
            $month = date("m",time());
             
        return date('t',strtotime($year.'-'.$month.'-01'));
    }
     
}
