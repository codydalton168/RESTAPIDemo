<?php

Class SiteData {
	
	public $sites = array(
		1 => 'TaoBao',  
		2 => 'Google',  
		3 => 'Runoob',  			
		4 => 'Baidu',  			
		5 => 'Weibo',  
		6 => 'Sina'
			
	);
		
	
	function getAllSite(){
		return $this->sites;
	}
	
	function getSite($id){
		
		$site = array($id => ($this->sites[$id]) ? $this->sites[$id] : $this->sites[1]);
		return $site;
	}	
}
?>