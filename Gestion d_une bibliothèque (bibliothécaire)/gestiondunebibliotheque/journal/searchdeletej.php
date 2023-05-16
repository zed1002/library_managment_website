<html>
  <head>
    
    
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

<link rel="stylesheet" href="http://localhost/gestiondunebibliotheque\css/searchs.css">
</head>
<?php
include_once "..\connexion\connexion.php";
include "..\js/file.php"?>
<?php include "../book/navigation.html"?>

  <body>
  <section class="section-1">
  <div class="waveo">
  <a href="http://localhost/gestiondunebibliotheque/index.php" style="position: fixed; bottom: 90%; font-size: 25px; color: white; margin-left: -47%;"><i class="fas fa-university "></i>Library</a>


  <form  method="POST">
    
      <div class="searchbar-container">
          <h1 class="heading-primary heading-primary--main"> DELETE JOURNAL </h1>
        <input class="search-bar" type="text" name="q" placeholder="search...(by default the search will be by reference)"/>
         <div class="dropdown">
         
  <div class="select" >
      <select name="column"  id="select_graphtype" class="fa select" style="width: 45px; border-radius:20px" >
      <option value=""> &#xf0b0; select filter </option>
        <option value="ref_r">reference</option>
        <option value="titre_r">title</option>
        <option value="emp">emplacement</option>
        <option value="annee_r">year</option>
        <option value="nbrexp_r">nbr-copy</option>
        <option value="prix">price</option>
      </select>
      </div>
    <div class="clear-fix"></div>
    
</div> 

      </div>
      <button class="btn dropbtno" type="submit" name="srchusrbtn">
                        search 
                      </button>
    </section>
                     
                      
</form>
<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320">
  <path fill=" rgb(255, 166,1)" fill-opacity="1" d="M0,128L48,144C96,160,192,192,288,218.7C384,245,480,267,576,261.3C672,256,768,224,864,208C960,192,1056,192,1152,213.3C1248,235,1344,277,1392,298.7L1440,320L1440,0L1392,0C1344,0,1248,0,1152,0C1056,0,960,0,864,0C768,0,672,0,576,0C480,0,384,0,288,0C192,0,96,0,48,0L0,0Z"></path>
</svg>
</div>
  </body>



  <div class="container text-center">

<?php

	if (isset($_POST['srchusrbtn'])):
    
		$q = $bdd->real_escape_string($_POST['q']);
		$column = $bdd->real_escape_string($_POST['column']);

		if ( ($column == "" ||$column != "ref_r" && $column != "titre_r"  && $column != "emp" && $column != "annee" && $column != "nbrexp_r"&& $column != "prix")){
    //default column
      $column = "ref_r";}
      if ($q==""){
echo "le champ est vide";
      }
     
if($q!=""):
        $sql = $bdd->query("SELECT * FROM revue WHERE $column LIKE '%$q%'"); ?>
       
        <div class="row justify-content-center">
        <h1 style="font-size:40px">Result</h1>
  <table class="table">
    <thead>
      <tr>
      <th>reference</th>
        <th>emplacement</th>
        <th>title</th>
        <th>nbrcopy</th>
        <th>year</th>
        <th>price</th>
        <th colspan="2">action</th>
      </tr>
    </thead>
        
    <?php
    while($row = $sql->fetch_assoc()):
    ?>
    <tr>
    <td><?php echo $row['ref_r'];?></td>
      <td><?php echo $row['emp'];?></td>
      <td><?php echo $row['titre_r'];?></td>
      <td><?php echo $row['nbrexp_r'];?></td>
      <td><?php echo $row['annee_r'];?></td>
      <td><?php echo $row['prix'];?></td>
      <td>
      
        
      <?php
      $ref=$row['ref_r'];
        $query = "SELECT * FROM emprunt
          where ref_fk='$ref' and genre='revue'";
          $result = mysqli_query($bdd,$query);
          if(mysqli_num_rows($result) == 0): ?>

        <a class="btn btn-info" name="deleteR" value="delete"  onClick="crnj(<?php echo $row['ref_r']; ?>)" > Delete </a>
        <?php endif;
      if(mysqli_num_rows($result) > 0): 
        echo "this journal is borrowed "?>
        <a href="http://localhost/gestiondunebibliotheque/retourner/return.php" class="btn btn-info" name='edit'>return</a>
      <?php endif;?>
      
      
      </td>

    </tr>
    <?php endwhile;?>
    
  </table>
</div>
    <?php endif;?>
</html>
<?php endif;?>



