<?php
class Paginator {
 
        private $_conn;
        private $_limit;
        private $_page;
        private $_query;
        private $_total;
 

//COnstructor of paginator

public function __construct( $conn, $query ) {
     
    $this->_conn = $conn;
    $this->_query = $query;
 
    $rs= $this->_conn->query( $this->_query )or die($conn->error);
    $this->_total =  $_SESSION["Total"];
    
    if(!(isset($_GET['page']))){$_GET['page'] = 1;}
    if(!(isset($_GET['ipp']))){$_GET['ipp'] = $this; }

//pick the appropriate query if a search was made (this is used for sorting on search result page)

    if(isset($_SESSION["NameQuery"])){$this->_query = $_SESSION["NameQuery"]; }
    else if(isset($_SESSION["GenreQuery"])){$this->_query = $_SESSION["GenreQuery"]; }
    else if(isset($_SESSION["YearQuery"])){$this->_query = $_SESSION["YearQuery"]; }
    else   $this->_query = $query;
     
}


//Set pagiantor data
public function getData( $page = 2, $limit = 25 ) {
     
    $this->_limit   = $limit;
    $this->_page    = $page;
 

        $query      = $this->_query .",".$this->_limit;
    
    $rs             = $this->_conn->query( $query )  or die($this->_conn->error);
 
    while ( $row = $rs->fetch_assoc() ) {
        $results[]  = $row;
    }
 
    $result         = new stdClass();
    $result->page   = $this->_page;
    $result->limit  = $this->_limit;
    $result->total  = $this->_total;
    $result->data   = $results;
 
    return $result;
}

public function createLinks( $links, $list_class ) {

//Calculate which is last and start page
     $last       = ceil(  $this->_total / $this->_limit );
 
    $start      = ( ( $this->_page - $links ) > 0 ) ? $this->_page - $links : 1;
    $end        = ( ( $this->_page + $links ) < $last ) ? $this->_page + $links : $last;
 
    $html       = '<ul class="' . $list_class . '">';
 
    $class      = ( $this->_page == 1 ) ? "disabled" : "";

//if there is  previous  page, show the option to move backward, otherwise don't
       if( $this->_page != $start )
{
    $html       .= '<li class="' . $class . '"><a href="?column='.$_SESSION["Column"].'&order='.$_SESSION["Asc_or_desc"].'&limit=' . $this->_limit . '&page=' . ( $this->_page - 1 ) . '">&laquo;</a></li>';
}
 
//Create numbers for page tabs
    if ( $start > 1 ) {
        $html   .= '<li><a href="?limit=' . $this->_limit . '&page=1">1</a></li>';
        $html   .= '<li class="disabled"><span>...</span></li>';
    }

 
    for ( $i = $start ; $i <= $end; $i++ ) {
        $class  = ( $this->_page == $i ) ? "active" : "";
        $html   .= '<li class="' . $class . '"><a href="?column='.$_SESSION["Column"].'&order='.$_SESSION["Asc_or_desc"].'&limit=' . $this->_limit . '&page=' . $i . '">' . $i . '</a></li>';
    }
 
    if ( $end < $last ) {
        $html   .= '<li class="disabled"><span>...</span></li>';
        $html   .= '<li><a href="?limit=' . $this->_limit . '&page=' . $last . '">' . $last . '</a></li>';
    }


    

    
    $class      = ( $this->_page == $last ) ? "disabled" : "";
//if there is  next page, show the option to move forward, otherwise don't
   if( $this->_page != $last )
{
    $html       .= '<li class="' . $class . '"><a href="?column='.$_SESSION["Column"].'&order='.$_SESSION["Asc_or_desc"].'&limit=' . $this->_limit . '&page=' . ( $this->_page + 1 ) . '">&raquo;</a></li>';
}
 
    $html       .= '</ul>';
 
    return $html;
}
   
}
