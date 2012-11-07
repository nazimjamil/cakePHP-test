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
        <?php echo $this->Form->create('enterForm', array('url' => 'index', 'id' => 'enterForm')); ?>
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
                    <input type='text' name='name' value='<?php echo empty($oldName) ? '' : $oldName; ?>' />
                </li>
                <li>
                    <input type='text' name='email' value='<?php echo empty($oldEmail) ? '' : $oldEmail; ?>' />
                </li>
                <li class='reqCopy'>
                    * These fields are required
                </li>
                <li class='checkbox'>
                    <input id='checkbox' type="checkbox" name="tnc" value="1" />I have read and understood the trivia below.
                </li>
                <li class="RegisterErrors" style="<?php echo !empty($displayErrorMessages) ? 'display:block' : ''?>">
                    <!-- Validation errors -->
                    <?php echo !empty($nameError) ? "<label class=error>".$nameError."</label>" : '' ?>
                    <?php echo !empty($emailError) ? "<label class=error>".$emailError."</label>" : '' ?>
                    <?php echo !empty($tncError) ? "<label class=error>".$tncError."</label>" : '' ?>
                </li>
                <li>
                    <input type="image" id="submit" name="data[enterForm][submit]" src="<?php echo $this->webroot ?>/img/buttons/<?php echo $buttonColour; ?>Button.png" class="picture" alt='Submit your entry ' <?php echo empty($btnStatus) ? '' : $btnStatus; ?>/><br />
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