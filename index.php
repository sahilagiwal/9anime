<?php
include("simple_html_dom.php");
if(isset($_GET['key']))
{
$nameofanime=$_GET['key'];
$linkforsearch='https://9anime.vc/search?keyword='.$nameofanime;
$html=file_get_html($linkforsearch);
$list=$html->find('div[class="flw-item item-qtip"]');
$arr=array();
for($i=0;$i<count($list);$i++)
{


$name= $list[$i]->find('h3[class="film-name"]');
$image=$list[$i]->find('div[class="film-poster"]',0)->find('img');
// var_dump($name);
$link=$list[$i]->find('h3[class="film-name"]',0)->find('a');

$link="https://9anime.vc".$link[0]->href;
    // echo ."<br>";
    //  echo $image[1] ."<br>";
    // echo $image[$j]->;

    array_push($arr,array("id"=>$i,"name"=>$name[0]->plaintext,"img"=>$image[0]->getAttribute('data-src'),"link"=>$link));
    // ,"poster"=>$image[$j]

}
echo (json_encode($arr));
}
else{
  echo("please use ?key='name of anime you want to search'");
}



?>