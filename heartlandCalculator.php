<?php include 'view/header.php'; ?>

<main>
    <form action="." method="post" id="aligned">
        <h1>Heartland Seamless Gutters</h1>
        <input type="hidden" name="action" value="calculate">

        <label for="gutter">Gutter:</label>
        <input type="text" id="gutter" value="<?php echo htmlspecialchars($gutter); ?>">
        <br>
        <label for="downspout">Downspout:</label>
        <input type="text" id="downspout" value="<?php echo htmlspecialchars($downspout); ?>">
        <br>
        <label for="elbowsA">Elbows A:</label>
        <input type="text" id="elbowsA" value="<?php echo htmlspecialchars($elbowsA); ?>">
        <br>
        <label for="elbowsB">Elbows B:</label>
        <input type="text" id="elbowsB" value="<?php echo htmlspecialchars($elbowsB); ?>">
        <br>
        <label for="insideMiters">Inside Miters:</label>
        <input type="text" id="insideMiters" value="<?php echo htmlspecialchars($insideMiters); ?>">
        <br>
        <label for="outsideMiters">Outside Miters:</label>
        <input type="text" id="outsideMiters" value="<?php echo htmlspecialchars($outsideMiters); ?>">
        <br>
        <label for="endCapsL">End Caps L:</label>
        <input type="text" id="endCapsL" value="<?php echo htmlspecialchars($endCapsL); ?>">
        <br>
        <label for="endCapsR">End Caps R:</label>
        <input type="text" id="endCapsR" value="<?php echo htmlspecialchars($endCapsR); ?>">
        <br>
        <label for="insideBayMiter">Inside Bay Miter:</label>
        <input type="text" id="insideBayMiter" value="<?php echo htmlspecialchars($insideBayMiter); ?>">
        <br>
        <label for="outsideBayMiter">Outside Bay Miter:</label>
        <input type="text" id="outsideBayMiter" value="<?php echo htmlspecialchars($outsideBayMiter); ?>">
        <br>
        <label for="outlets">Outlets:</label>
        <input type="text" id="outlets" value="<?php echo htmlspecialchars($outlets); ?>">
        <br>
        <label for="hinge">Hinge/Flip Ups:</label>
        <input type="text" id="hinge" value="<?php echo htmlspecialchars($hinge); ?>">
        <br>
        <label for="drainTileAdaptor">Drain Tile Adapter:</label>
        <input type="text" id="drainTileAdaptor" value="<?php echo htmlspecialchars($drainTileAdaptor); ?>">
        <br>
        <label for="fascia">Fascia:</label>
        <input type="text" id="fascia" value="<?php echo htmlspecialchars($fascia); ?>">
        <br>
        <label for="soffit">Soffit:</label>
        <input type="text" id="soffit" value="<?php echo htmlspecialchars($soffit); ?>">
        <br>
        <label for="total">Total:</label>
        <input value="<?php echo htmlspecialchars($total); ?>" id="total" disabled>
        <br>
        <label>&nbsp;</label>
        <input type="submit" value="Calculate">
    </form>
</main>

<?php include 'view/footer.php'; ?>