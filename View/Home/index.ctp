<div id='content'>
    <div class='header'>
        <!-- HEADER -->
        <div class='headerImg'></div>
    </div>
    <div class='topcurve'></div>
    <?php if (!$like) { echo "<div class='likeArrow'></div>"; } else { echo ''; }; ?>
    <div class='form'>
        <!-- FORM -->
        <h1><?php echo $header1; ?></h1>
        <p class='copy'>
            <?php echo $copyDeck; ?>
        </p>
        <p class='mugshot'>
        <?php echo $this -> Html -> image ('assets/mugshot.jpg', array('alt' => 'product', 'width' => 130, 'height' => 170)); ?>
        </p>
        <?php echo $this->Form->create('enterForm', array('url' => '/', 'id' => 'enterForm')); ?>
            <ul class='clear'>
                <li>
                    <label>your name: <span class='red'>*</span></label>
                </li>
                <li>
                    <label>your email address: <span class='red'>*</span></label>
                </li>

            </ul>
            <ul class='inputFields'>
                <li>
                    <input type='text' name='name' value='<?php echo $oldName; ?>' />
                </li>
                <li>
                    <input type='text' name='email' value='<?php echo $oldEmail; ?>' />
                </li>
                <li class='reqCopy'>
                    * These fields are required
                </li>
                <li class='checkbox'>
                    <input id='checkbox' type="checkbox" name="tnc" value="1" />I have read and understood the trivia below.
                </li>
                <li class="RegisterErrorsServer">
                    <!-- Server-side validation errors -->
                    <?php if(!empty($errors)) : ?>
                    <?php 	foreach($errors as $message) : ?>
                    	<label class="error"><?php echo $message; ?></label>
                   	<?php 	endforeach; ?>
                    <?php endif; ?>
                </li>
                <li class="RegisterErrors">
                	<!-- Validation errors -->
                </li>
                <li>
                    <input type="image" id="submit" name="submit" src="img/buttons/<?php echo $buttonColour; ?>Button.png" class="picture" alt="<?php echo $buttonCopy; ?>" <?php echo $btnStatus; ?>/><br />
                </li>
                <li class='btnCopy'>
                    <?php echo $buttonCopy; ?>
                </li>
            </ul>
        <?php echo $this -> Form -> end(); ?>
        <p class='btmCTA'>Haven't seen this film yet? Why not <a href='http://www.imdb.com/title/tt0091949/' title='read about it here' target='blank'>read about it here</a>.</p>
    </div>
    <div class='bottomcurve'></div>
</div>
<div class='footer'>
    <!-- FOOTER -->
    <?php echo $this -> element ('footer'); ?>
</div>