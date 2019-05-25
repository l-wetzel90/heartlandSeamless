<?php include 'view/header.php'; ?>
<main>
    <form action="." method="post" id="aligned" class="container-fluid">
        <input type="hidden" name="action" value="results">
        <header class="container-fluid">
            <div class="row justify-content-center" >
                <div class="col-auto d-none d-sm-block">
                    <p>Serving Southeast Nebraska</p>
                    <p>Contact Us</p>
                    <p>Jonathan Wagner 402.413.0092</p>
                    <p>Junior Reyes 402.309.4913<br>
                        (Se Habla Espanol)</p>
                    <p>heartlandseamless@gmail.com </p>
                </div>
                <div class="col-auto">
                    <img src="images/UpdatedLogo.PNG" class="img-fluid" alt="Heartland Logo"/>
                </div>
                <div class="col-auto">
                    <h4>
                        Customer Information
                    </h4>
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
        </header>
        <br>
        <?php $i = 1; 
        foreach ($gParts as $g) : ?>
            <!--label-->
            <div class="form-group row no-gutters">
                <div class="col-auto show"  data-toggle="collapse" href="#collapse<?php echo $i; ?>" role="button" aria-expanded="false" aria-controls="collapse<?php echo $i;?>">
                    <label for="<?php echo htmlspecialchars(lcfirst(str_replace(' ', '', $g))); ?>"
                           class="col-form-label"><?php echo htmlspecialchars($g); ?>:</label>
                </div>
                <div class="collapse" id="collapse<?php echo $i; ?>">
                        <!-- amount textbox-->
                        <div class="col-auto">
                            <input type="text" class="form-control"
                                   name="<?php echo htmlspecialchars(lcfirst(str_replace(' ', '', $g))); ?>"
                                   id="<?php echo htmlspecialchars(lcfirst(str_replace(' ', '', $g))); ?>"
                                   placeholder="<?php echo htmlspecialchars($g); ?>" >
                        </div>
                        <!--price textbox-->
                        <div class="col-auto">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <label class="input-group-text" 
                                           for="<?php echo htmlspecialchars(lcfirst(str_replace(' ', '', $g))); ?>2">&commat;</label>
                                </div>
                                <input type="number" class="form-control" 
                                       name="<?php echo htmlspecialchars(lcfirst(str_replace(' ', '', $g))); ?>2"
                                       id="<?php echo htmlspecialchars(lcfirst(str_replace(' ', '', $g))); ?>2" 
                                       placeholder="$$" min="0">

                                <!--select if we decide to put it back in-->
                                <!--<select name="<?php // echo htmlspecialchars(lcfirst(str_replace(' ', '', $g)));     ?>2"
                                        id="<?php // echo htmlspecialchars(lcfirst(str_replace(' ', '', $g)));     ?>2"
                                        class="custom-select form-control-sm">
                                <?php // for ($i = 1; $i <= 10; $i++): ?>
                                        <option value="<?PHP // echo htmlspecialchars($i);     ?>">$<?PHP // echo htmlspecialchars($i);     ?></option>
                                <?php // endfor; ?>
                                </select>-->

                            </div>
                        </div>
                </div><!-- end of collapse-->
            </div>
            <?php $i++ ?>
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
</main>
<?php
include 'view/footer.php';
