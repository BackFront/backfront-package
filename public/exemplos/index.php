<?php require_once (dirname(__FILE__) . '/../header.php'); ?>
<div class="container">
    <div class="bfe top-20">
        <div class="row">
            <div class="table-responsive col-md-12">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>Class Name</th>
                            <th>Namespace</th>
                            <th>Current version</th>
                            <th>Link</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>
                                <b>Form</b>
                            </td>
                            <td>Form/</td>
                            <td>1.0.0</td>
                            <td>
                                <a class="btn btn-default" href="<?php echo EXEMPLE_URL; ?>/ex_class_form.php" role="button">Ver documentação</a>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <b>Application</b>
                            </td>
                            <td>Wordpress/</td>
                            <td>1.0.0</td>
                            <td>
                                <a class="btn btn-default" href="<?php echo EXEMPLE_URL; ?>/ex_class_wordpress-application.php" role="button">Ver documentação</a>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<?php
require_once (dirname(__FILE__) . '/../footer.php');
