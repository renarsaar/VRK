<div class="home-events">
<?php foreach($events as $event) : ?>
  <div class="event">
    <h2><?php echo $event["title"]; ?></h2>
    <h5>Event At: <?php echo $event["event_at"]; ?></h5>
    <p class="txt-home"><?php echo $event["descr"]; ?></p>
    <a class="btn" href="event.php?id=<?php echo $event["id"]; ?>">View more</a>
  </div>
<?php endforeach; ?>
</div>