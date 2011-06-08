<form id="searchform" action="" method="get">
				<input type="text" value="Search Keyword here" onfocus="if (this.value == 'Search Keyword here') {this.value = '';}" onblur="if (this.value == '') {this.value = 'Search Keyword and hit enter';}"  value="<?php echo wp_specialchars($s, 1); ?>" name="s" id="s" />
				<input id="searchsubmit" type="submit" value=""/>
				<div class="clear"></div>
			</form>
			<div class="clear"></div>