<?
include 'similarity.php';
//file similarity jangan dirubah, itu sudah patternya. yang perlu kamu perhatikan adalah yang di bawah ini

//$artikel merupakan semua data terkait artikel,(ada arikelnya dan tagnya) kaya karya tulis ilmiah ada latar belakang, bab 1, 2, 3
//$target merupakan komponen karya tulis ilmiah yang akan kita bandingkan dengan komponen karyatulis ilmiah mhs A

//ibaratnya ($artikel) ini adalah laporan karyatulis ilmiah dari mahasiswa A, di karyatulis ilimiah itu kita mau cari membandingakan latar belakang pnya mhs A dengan latar belakang yang ada di internet ($target). (latar belakang dari internet ini kita masukkan ke dalam inputan textarea)
//============================IBARAT KARYA TULIS ILMIAH===============================
$articles = array(
	array(
		"article" => "Data Mining: Finding Similar Items", 
		"tags" => array("Algorithms", "Programming", "Mining", "Python", "Ruby")
	),
	array(
		"article" => "Blogging Platform for Hackers",  
		"tags" => array("Publishing", "Server", "Cloud", "Heroku", "Jekyll", "GAE")
	),
	array(
		"article" => "UX Tip: Don't Hurt Me On Sign-Up", 
		"tags" => array("Web", "Design", "UX")
	),
	array(
		"article" => "Crawling the Android Marketplace", 
		"tags" => array("Python", "Android", "Mining", "Web", "API")
	)
);
//$tags akan memanggil kelas Similarity untuk mengidentifikasi tags pada setiap artikel di atas
$tags = Similarity::tags_to_point($articles);

//di bawah ini ibaratnya latar belakang yang dari internet tadi. akan memembandingkan data ini dengan data pada variabel $articles
$target = array('Publishing', 'Web', 'API');
echo 'compare';
var_dump($articles);
var_dump($target);

$compare = array_fill_keys($target, 1) + $tags;
//kode dibawah ini nantinya akan memberi skor dari artikel yang ada berdasarkan targetnya.klo kalian jalankan akan seperti yang ada di file README.md
foreach($articles as $article) {
	$ak = array_fill_keys($article['tags'], 1) + $tags;
	echo $article['article'];
	echo '<br />';
	echo "score: ";
	echo Similarity::cosine($compare, $ak);
	echo '<br />';echo '<br />';
}
