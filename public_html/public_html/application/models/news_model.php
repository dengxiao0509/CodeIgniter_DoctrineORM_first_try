 
<?php
class News_model extends CI_Model {

	public function __construct()
	{
		$this->load->database();
	}


	public function get_news($id = FALSE)
	{
	        /*
	        //--------with doctrin----------------
	        $em=$this->doctrine->em;
	   	
		if ($id === FALSE)
		{
		      $mynews = $em->getRepository('\Entities\News')->findAll();			
		      return $mynews;
		}

		$mynews = $em->getRepository('\Entities\News')->findOneById($id);
		return $mynews;
		//------------------------------------
		*/
		
		
		 
		//------------without doctrine---------------
		if ($id === FALSE)
		{
			$query = $this->db->get('news');
			return $query->result_array();
		}

		$query = $this->db->get_where('news', array('id' => $id));
		return $query->row_array();
		//----------------------------------------------------
		
	}
	public function set_news()
	{
	
		$this->load->helper('url');
		$slug = url_title($this->input->post('title'), 'dash', TRUE);

		$data = array(
			'title' => $this->input->post('title'),
			'slug' => $slug,
			'text' => $this->input->post('text')
		);
		
                /*
                //-------with  doctrine-----------
		$mynews=new \Entities\News();
		
		$mynews->setTitle($data['title']);
		$mynews->setText($data['text']);
		$mynews->setSlug($slug);
		
		$em=$this->doctrine->em;
		
		$em->persist($mynews);
		
		$em->flush();
			
		return $mynews;
		//---------------------
		*/
		
		
		
		
		//--------without doctrine-------------
		return $this->db->insert('news', $data);
		//-------------------------------------
		
	}
	public function delete_news($id)
	{
		/*
		//-------with  doctrine-----------
		$em=$this->doctrine->em;
		$mynews = $em->getRepository('\Entities\News')->findOneById($id);
		$em->remove($mynews);
		$em->flush();
		//---------------------
		*/
		
		
		//--------without doctrine-------------
		$this->db->delete('news',array('id' => $id));
		//-------------------------------------
		
	}
	
}