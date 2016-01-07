
@if (isset($make->id))



<div id="beadSlider"></div>



@endif










<nav class="footer-navbar navbar navbar-default navbar-fixed-bottom" role="navigation">
    <!-- Your Footer Content -->

    <div id="footer_higher">
        <div id="footer_content">
            <div class="slider_wrapper">
                <div class="slider_container">
                    <ul class='items-list cf'>
                        <li class="info">
                            <div class="pot">
                                <div class="b2 item" ui-draggable="">
                                    <input type="hidden" name="id[]" value="2">
                                </div>
                            </div>
                            <div><a class="f-popover-trigger" href="data/popover-1.html">Title 1</a>
                                <h4>Blue</h4>

                            </div>
                        </li>
                        <li class="info">
                            <div class="pot">
                                <div class="b1 item" ui-draggable="">
                                    <input type="hidden" name="id[]" value="2">
                                </div>
                            </div>
                            <div><a class="f-popover-trigger" href="data/popover-1.html">Title 1</a>
                                <h4>orange</h4>

                            </div>
                        </li>
                        <li class="info">
                            <div class="pot">
                                <div class="b1 item" ui-draggable="">
                                    <input type="hidden" name="id[]" value="2">
                                </div>
                            </div>
                            <div><a class="f-popover-trigger" href="data/popover-1.html">Title 1</a>
                                <h4>orange</h4>

                            </div>
                        </li>
                        <li class="info">
                            <div class="pot">
                                <div class="b1 item" ui-draggable="">
                                    <input type="hidden" name="id[]" value="2">
                                </div>
                            </div>
                            <div><a class="f-popover-trigger" href="data/popover-1.html">Title 1</a>
                                <h4>orange</h4>

                            </div>
                        </li>
                        <li class="info">
                            <div class="pot">
                                <div class="b1 item" ui-draggable="">
                                    <input type="hidden" name="id[]" value="2">
                                </div>
                            </div>
                            <div><a class="f-popover-trigger" href="data/popover-1.html">Title 1</a>
                                <h4>orange</h4>

                            </div>
                        </li>
                        <li class="info">
                            <div class="pot">
                                <div class="b1 item" ui-draggable="">
                                    <input type="hidden" name="id[]" value="2">
                                </div>
                            </div>
                            <div><a class="f-popover-trigger" href="data/popover-1.html">Title 1</a>
                                <h4>orange</h4>

                            </div>
                        </li>
                        <li class="info">
                            <div class="pot">
                                <div class="b1 item" ui-draggable="">
                                    <input type="hidden" name="id[]" value="2">
                                </div>
                            </div>
                            <div><a class="f-popover-trigger" href="data/popover-1.html">Title 1</a>
                                <h4>orange</h4>

                            </div>
                        </li>
                        <li class="info">
                            <div class="pot">
                                <div class="b1 item" ui-draggable="">
                                    <input type="hidden" name="id[]" value="2">
                                </div>
                            </div>
                            <div><a class="f-popover-trigger" href="data/popover-1.html">Title 1</a>
                                <h4>orange</h4>

                            </div>
                        </li>
                        <li class="info">
                            <div class="pot">
                                <div class="b1 item" ui-draggable="">
                                    <input type="hidden" name="id[]" value="2">
                                </div>
                            </div>
                            <div><a class="f-popover-trigger" href="data/popover-1.html">Title 1</a>
                                <h4>orange</h4>

                            </div>
                        </li>
                        <li class="info">
                            <div class="pot">
                                <div class="b1 item" ui-draggable="">
                                    <input type="hidden" name="id[]" value="2">
                                </div>
                            </div>
                            <div><a class="f-popover-trigger" href="data/popover-1.html">Title 1</a>
                                <h4>orange</h4>

                            </div>
                        </li>
                        <li class="info">
                            <div class="pot">
                                <div class="b1 item" ui-draggable="">
                                    <input type="hidden" name="id[]" value="2">
                                </div>
                            </div>
                            <div><a class="f-popover-trigger" href="data/popover-1.html">Title 1</a>
                                <h4>orange</h4>

                            </div>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="clear"></div>
        </div>
    </div>
    <div id="footer">
        <div class="container">
            <div class="holder">
                <p class="text-muted credit">

                <div class="btn-group">
                    <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown"> Item <span
                            class="caret caret-up"></span></button>
                    <ul class="dropdown-menu drop-up" role="menu">
                        <li class='colour_id' id='1'><a href='#' class='footer_button'>menu1</a></li>
                        <li class='colour_id' id='2'><a href='#' class='footer_button'>menu2</a></li>
                    </ul>
                </div>
                <div class="btn-group">
                    <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown"> Item 2 <span
                            class="caret caret-up"></span></button>
                    <ul class="dropdown-menu drop-up" role="menu">
                        <li class='z_id' id='1'><a href='#' class='footer_button'>menu1</a></li>
                        <li class='z_id' id='2'><a href='#' class='footer_button'>menu2</a></li>
                    </ul>
                </div>
                </p>
            </div>
        </div>
    </div>
</nav>
</div>
</div>
</div>




    <!-- Le javascript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->





{{ HTML::script('js/jquery.confirm.js.js') }}
{{ HTML::script('js/bootstrap.min.js') }}
{{ HTML::script('js/bootswatch.js') }}
{{ HTML::script('js/jquery.mousewheel.min.js') }}
{{ HTML::script('js/jquery.mCustomScrollbar.concat.mi.js') }}
{{ HTML::script('js/scripts.js') }}

    
@yield("footer")


  </body>
  
  











  

</html>