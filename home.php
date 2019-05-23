<?php include 'view/header.php'; ?>
<main>
    <div class="container-fluid">
        <form action="." method="post" id="aligned">
            <input type="hidden" name="action" value="results">
            <header>
                <div class="container-fluid">
                    <div class="row">
                        <div class="col d-none d-sm-block">
                            <p>Serving Southeast Nebraska</p>
                            <p>Contact Us</p>
                            <p>Jonathan Wagner 402.413.0092</p>
                            <p>Junior Reyes 402.309.4913<br>
                                (Se Habla Español)</p>
                            <p>heartlandseamless@gmail.com </p>
                        </div>
                        <div class="col">
                            <img src="images/UpdatedLogo.PNG" class="img-fluid" alt="Heartland Logo"/>
                        </div>
                        <div class="col">
                            <h4>
                                Customer Information
                            </h4>
                            <div class="col-auto">
                                <input type="text" name="cName" class="form-control"
                                       value="<?php echo htmlspecialchars($cName); ?>"
                                       placeholder="Name">
                                <input type="text" name="company" class="form-control"
                                       value="<?php echo htmlspecialchars($company); ?>"
                                       placeholder="Company Name">
                                <input type="text" name="address" class="form-control"
                                       value="<?php echo htmlspecialchars($address); ?>"
                                       placeholder="Address">
                                <input type="text" name="phone" class="form-control"
                                       value="<?php echo htmlspecialchars($phone); ?>"
                                       placeholder="Phone">
                                <input type="text" name="email" class="form-control"
                                       value="<?php echo htmlspecialchars($email); ?>"
                                       placeholder="Email">
                            </div>
                        </div>
                    </div>
                </div>
            </header>
            <br>
            <?php foreach ($gParts as $g) : ?>
                <div class="form-group row no-gutters">
                    <div class="col-auto d-xl-none">
                        <label for="<?php echo htmlspecialchars(lcfirst(str_replace(' ', '', $g))); ?>"
                               class="col-form-label"><?php echo htmlspecialchars($g); ?>:</label>
                    </div>
                    <div class="col-auto">
                        <input type="text" class="form-control"
                               name="<?php echo htmlspecialchars(lcfirst(str_replace(' ', '', $g))); ?>"
                               id="<?php echo htmlspecialchars(lcfirst(str_replace(' ', '', $g))); ?>"
                               placeholder="<?php echo htmlspecialchars($g); ?>" value="">
                    </div>
                    <div class="col-auto">
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <label class="input-group-text" for="<?php echo htmlspecialchars(lcfirst(str_replace(' ', '', $g))); ?>2">&commat;</label>
                            </div>
                            <select name="<?php echo htmlspecialchars(lcfirst(str_replace(' ', '', $g))); ?>2"
                                    id="<?php echo htmlspecialchars(lcfirst(str_replace(' ', '', $g))); ?>2"
                                    class="custom-select form-control-sm">
                                        <?php for ($i = 1; $i <= 10; $i++): ?>
                                    <option value="<?PHP echo htmlspecialchars($i); ?>">$<?PHP echo htmlspecialchars($i); ?></option>
                                <?php endfor; ?>
                            </select>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>

            <!--            <div class="col-auto">
                            <textarea name="notes" rows="3" placeholder="Notes/Add-Ons"></textarea>
            
                            </div>-->
            <div class="form-group row"> 
                <div class="col-2 text-right">
                    <label class="col-form-label">&nbsp;</label>
                </div> 
                <div class="col-auto">
                    <input type="submit" class="btn btn-primary" value="Calculate">
                </div>
            </div>
        </form>
    </div>
</main>
<?php
include 'view/footer.php';
