<!-- Join us modal-->
<div id="join-modal" class="modal fade" tabindex="-1" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Join us</h4>
            </div>
            <div class="modal-body">
                <form method="post" action="main/registration_user" class="form-horizontal">
                    <div class="form-group">
                        <label style="font-weight: 100" for="inputEmail3" class="col-sm-2 control-label">Name</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control"  name="u-name" placeholder="Name">
                        </div>
                    </div>
                    <div class="form-group">
                        <label style="font-weight: 100" for="inputEmail3" class="col-sm-2 control-label">Phone</label>
                        <div class="col-sm-10">
                            <input type="number" class="form-control"  name="u-phone" placeholder="Phone">
                        </div>
                    </div>
                    <div class="form-group">
                        <label style="font-weight: 100" for="inputEmail3" class="col-sm-2 control-label">City</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control"  name="u-city" placeholder="City">
                        </div>
                    </div>
                    <div class="form-group">
                        <label style="font-weight: 100" for="inputEmail3" class="col-sm-2 control-label">Email</label>
                        <div class="col-sm-10">
                            <input type="email" class="form-control"  name="u-email" placeholder="Email">
                        </div>
                    </div>
                    <div class="form-group">
                        <label style="font-weight: 100" for="inputPassword3" class="col-sm-2 control-label">Password</label>
                        <div class="col-sm-10">
                            <input type="password" class="form-control"  name="u-pass" placeholder="Password">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-offset-2 col-sm-10">
                            <button type="submit" class="btn btn-primary">Join</button>
                        </div>
                    </div>
                </form>
            </div>
            <!--
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save changes</button>
            </div>
            -->
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
<!-- ./Join us modal-->

<!-- Sign in modal-->
<div id="sign-in-modal" class="modal fade" tabindex="-1" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Sign in</h4>
            </div>
            <div class="modal-body">
                <form method="post" action="main/authorization_user" class="form-horizontal">
                    <div class="form-group">
                        <label style="font-weight: 100;" for="inputEmail3" class="col-sm-2 control-label">Email</label>
                        <div class="col-sm-10">
                            <input type="email" class="form-control" id="inputEmail3" name="s-email" placeholder="Email">
                        </div>
                    </div>
                    <div class="form-group">
                        <label style="font-weight: 100;" for="inputPassword3" class="col-sm-2 control-label">Password</label>
                        <div class="col-sm-10">
                            <input type="password" class="form-control" id="inputPassword3" name="s-pass" placeholder="Password">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-offset-2 col-sm-10">
                            <button type="submit" class="btn btn-primary">Sign in</button>
                        </div>
                    </div>
                </form>
            </div>
            <!--
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save changes</button>
            </div>
            -->
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<!-- Modal info-->
<div id="w-info" class="modal fade" tabindex="-1" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title"></h4>
            </div>
            <div style="text-align: center" id="info-body" class="modal-body">
                <?php
                echo $this->session->flashdata('message');
                ?>
            </div>
            <div class="modal-footer">

            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<!--Modal "Display product info" -->

<div id="product_view_info" class="modal fade" tabindex="-1" role="dialog" data-backdrop="static" data-keyboard="false"> <!--data-backdrop="static" data-keyboard="false" - screen click modal close disable -->
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" id="produc-m-close" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Product details</h4>
            </div>
            <div id="product_view_wrapper" class="modal-body">
                <div style="width: 100%;position: relative;text-align: center">
                    <!--
                    <img style="width: 100%" class="product-view-m-img" src="" alt="alt">
                    -->
                    <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
                        <!-- Indicators -->
                        <ol class="carousel-indicators">
                            <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
                            <li data-target="#carousel-example-generic" data-slide-to="1"></li>
                            <li data-target="#carousel-example-generic" data-slide-to="2"></li>
                        </ol>

                        <!-- Wrapper for slides -->
                        <div style="background: none" id="m-p-view-body" class="carousel-inner" role="listbox">
                            <!--
                            <div class="item active">
                                sdfsdfsdfsdf
                                <img src="..." alt="...">
                                <div class="carousel-caption">
                                    ...
                                </div>
                            </div>
                            <!--
                            <div class="item">
                                <img src="..." alt="...">
                                <div class="carousel-caption">
                                    ...
                                </div>
                            </div>
                            -->
                        </div>

                        <!-- Controls -->
                        <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
                            <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
                            <span class="sr-only">Previous</span>
                        </a>
                        <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
                            <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
                            <span class="sr-only">Next</span>
                        </a>
                    </div>
                </div>
            </div>
            <!--
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save changes</button>
            </div>
            -->
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<!-- ./Modal-->