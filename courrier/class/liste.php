 <?php $var = getCourrier() ?>
 <div class="col-md-12">
  <?php 
      if(array_key_exists('message', $_SESSION)) : ?>
        <ul>
          <?php foreach ($_SESSION['message'] as $key => $message): ?>
          <li><div class="alert alert-<?php echo $key ?> "><?php echo $message ?></div></li>
        <?php endforeach ?>
        </ul>
      <?php endif ?>
      <?php unset($_SESSION['message']); ?> 
   </div> 

  <?php if (isset($_GET['search'])): ?>
  <?php $var = searchCourrier($_GET['search']) ?>
    <div class="row">
      <table class='table table-hover table-sm'>
        <thead>
          <th> <a href=""></a></th>
          <th>Objet</th>
          <th>Référence</th>
          <th>Remarque</th>
          <th>Autorité Origine</th>
          <th>Date</th>
        </thead>
      <?php foreach ($var as $value): ?>
        <tbody>
          <td><a href="index.php?p=view&id=<?php echo $value->id ?>">Voir</a></td>
          <td><?php echo utf8_encode( $value->objet_courrier) ?></td>
          <td><?php echo utf8_encode( $value->numrefcourrier) ?></td>
          <td><?php echo utf8_encode( $value->remarque) ?></td>
          <td><?php echo utf8_encode( $value->autorite_origine) ?></td>
          <td width="10%"><?php echo utf8_encode( $value->datecourrier) ?></td>
        </tbody>
      <?php endforeach ?>
      </table>

     </div>
  <?php endif ?>     
      

  <?php if (!isset($_GET['search'])): ?>

 <div class="row">
  <table class='table table-striped'>
    <thead>
      <th> <a href=""></a></th>
      <th>Objet</th>
      <th>Référence</th>
      <th>Remarque</th>
      <th>Autorité Origine</th>
      <th width="10%">Date</th>
    </thead>
  <?php foreach ($var as $value): ?>
    <tbody>
      <td><a href="index.php?p=view&id=<?php echo $value->id ?>">Voir</a></td>
      <td><?php echo utf8_encode( $value->objet_courrier) ?></td>
      <td><?php echo utf8_encode( $value->numrefcourrier) ?></td>
      <td><?php echo utf8_encode( $value->remarque) ?></td>
      <td><?php echo utf8_encode( $value->autorite_origine) ?></td>
      <td><?php echo utf8_encode( $value->datecourrier) ?></td>
    </tbody>
  <?php endforeach ?>
  </table>

 </div>
  <?php endif ?>     
  
