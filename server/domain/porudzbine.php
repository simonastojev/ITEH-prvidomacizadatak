<?php 

class Porudzbina {

	public $id_porudzbine;
	public $naziv;
	public $cena;
	public $tip_porudzbine;
    public $datum_porucivanja;
    public $vrsta_por;
	
	
	public function constructor($id_porudzbine,$naziv,$cena,$tip_porudzbine,$datum_porucivanja,$vrsta_por)
	{
        $this->id_porudzbine = $id_porudzbine;
        $this->naziv = $naziv;
        $this->cena = $cena;
        $this->tip_porudzbine = $tip_porudzbine;
        $this->datum_porucivanja = $datum_porucivanja;
        $this->vrsta_por = $vrsta_por;

	}
	
	public function ubaciPorudzbinu($data,$db){
		
		if($data['naziv'] === '' || $data['cena'] === '' || $data['tip_porudzbine'] === ''|| $data['datum_porucivanja']===''){
		$this-> poruka ='Morate popuniti polja!';
		
		}else{
		
			$save = $db->query("INSERT INTO porudzbine(naziv,cena,tip_porudzbine,datum_porucivanja,id_vrste) VALUES
			 ('".$data['naziv']."','".$data['cena']."','".$data['tip_porudzbine']."','".$data['datum_porucivanja']."','".$data['id_vrste']."')") 
			 or die($db->error);
			if($save){
				$this -> poruka = 'Uspešno sačuvana poruždbina!';
			}else{
				$this -> poruka = 'Neuspešno sačuvana porudžbina!';
			}
		}
	}
	
	public function getPoruka(){
		return $this -> poruka;
	}

	public static function vratiSve($db,$uslov){
		$query = "SELECT * FROM porudzbine p JOIN vrste_porudzbina v ON p.id_vrste=v.id_vrste".$uslov;
		$query = trim($query);
        $result = $db->query($query) or die($db->error);
        $array = [];
        while ($r = $result->fetch_assoc()){
			$vrsta_por = new Vrsta($r['id_vrste'],$r['naziv_vrste']);
			$porudzbina = new Porudzbina($r['id_porudzbine'],$r['naziv'],$r['cena'],$r['tip_porudzbine'],$r['datum_porucivanja'],$vrsta_por);
            array_push($array,$porudzbina);
            }
        return $array;
    }

}


?>