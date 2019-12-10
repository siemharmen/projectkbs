
<?php include "ProductFuncties.php"; ?>
<?php include "navbar.php"; ?>

<div class="container">
    <div style="text-align:center">
        <h2>Stel hier uw vraag</h2>
    </div>
    <div class="row">

        <div class="column">
            <form action="Beantwoordvraag.php">
                <textarea id="subject" name="subject" placeholder="Stel hier uw vraag.." style="height:300px"></textarea>
                <input type="submit" value="Plaats">
            </form>
        </div>
    </div>
</div>
