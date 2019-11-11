<h2>RSS News Reader</h2>
<br>
        <?php
        //Feed URLs
        $feeds = array(
            "https://farelthegecko.wordpress.com/feed/"
        );
        
        $entries = array();
        foreach($feeds as $feed) {
            $xml = simplexml_load_file($feed);
            $entries = array_merge($entries, $xml->xpath("//item"));
        }
        
        usort($entries, function ($feed1, $feed2) {
            return strtotime($feed2->pubDate) - strtotime($feed1->pubDate);
        });
        
        ?>
        
		<?php
        //Print all the entries
        foreach($entries as $entry){
            ?>
            <h4><a href="<?= $entry->link ?>"><?= $entry->title ?></a> </h4>
            
            <p>
			<small><?= strftime('%d.%m.%Y %k:%M ', strtotime($entry->pubDate)) ?></small><br>
			<?= $entry->description ?></p>
			<hr>
            <?php
        }
        ?>
