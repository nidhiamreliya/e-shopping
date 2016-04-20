<link href="<?php echo base_url('assets/css/editor/external/google-code-prettify/prettify.css')?>"rel="stylesheet">
<link href="<?php echo base_url('assets/css/editor/index.css" rel="stylesheet')?>">
<!-- select2 -->
<link href="<?php echo base_url('assets/css/select/select2.min.css')?>" rel="stylesheet">
<!-- switchery -->
<link rel="stylesheet" href="<?php echo base_url('assets/css/switchery/switchery.min.css')?>" />

<body class="nav-md">
      <!-- page content -->
      <div class="right_col" role="main">
        <div class="">

          <div class="page-title">
            <div class="title_left">
              <h3>Products</h3>
            </div>
          </div>
          <div class="clearfix"></div>
          <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
              <div class="x_panel">
                <div class="x_title">
                  <h2>Edit product</h2>
                  <div class="clearfix"></div>
                </div>
                <span class="text-success col-md-offset-2">
                <?php
                  if($this->session->flashdata('successful'))
                  {
                    echo $this->session->flashdata('successful');
                  }
                ?>
                </span>
                <div class="x_content">
                  <br />
                  <?php
                    $data = array(
                          'name'  => 'demo-form2',
                          'id' => 'demo-form2',
                          'class' => "form-horizontal form-label-left"
                        );
                  ?> 
                 <?php echo form_open_multipart('admin_products/insert_product', $data);?>
                <div class="col-md-9 col-sm-9 col-xs-12">
                  <div class="form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Category Name <span class="required">*</span>
                    </label>
                    <div class="col-md-7 col-sm-7 col-xs-12">
                    <?php 
                      if($product['category_id'])
                      { ?>
                        <input type="text" id="category_id" name="category_id" required="required" class="form-control col-md-7 col-xs-12" value="<?php echo $product['category_id'] ?>">
                        <label class="col-md-8 text-danger">
                          <?php echo form_error('category_id'); ?>
                        </label>
                    <?php  
                      }
                      else
                      { ?>
                        <select id="category_id"  name="category_id" class="form-control" required>
                          <option value="">--none--</option>
                        <?php foreach($category as $row):?>
                          <option value="<?php echo $row->category_id ?>"><?php echo $row->category_name ?></option>
                        <?php endforeach?>
                        </select>
                        <label class="col-md-8 text-danger">
                          <?php echo form_error('product_name'); ?>
                        </label>
                    <?php 
                      }
                    ?>
                    </div>
                  </div>

                  <div class="form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Product Name <span class="required">*</span>
                    </label>
                    <div class="col-md-7 col-sm-7 col-xs-12">
                      <input type="hidden" id="product_id" name="product_id" required="required" class="form-control col-md-7 col-xs-12" value="<?php echo $product['product_id'] ?>">
                      <input type="text" id="product_name" name="product_name" required="required" class="form-control col-md-7 col-xs-12" value="<?php echo $product['product_name'] ?>">
                      <label class="col-md-8 text-danger">
                        <?php echo form_error('product_name'); ?>
                      </label>
                    </div>
                  </div>

                  <div class="form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Description <span class="required">*</span>
                    </label>
                    <div class="col-md-7 col-sm-7 col-xs-12">
                      <input type="text" id="description" name="description" required="required" class="form-control col-md-7 col-xs-12" value="<?php echo $product['description'] ?>">
                      <label class="col-md-8 text-danger">
                        <?php echo form_error('description'); ?>
                      </label>
                    </div>
                  </div>

                  <div class="form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Price <span class="required">*</span>
                    </label>
                    <div class="col-md-7 col-sm-7 col-xs-12">
                      <input type="text" id="price" name="price" required="required" class="form-control col-md-7 col-xs-12" value="<?php echo $product['product_price'] ?>">
                      <label class="col-md-8 text-danger">
                        <?php echo form_error('price'); ?>
                      </label>
                    </div>
                  </div>

                  <div class="form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Image <span class="required">*</span>
                    </label>
                    <div class="col-md-6 col-sm-6 col-xs-11">
                      <input type="file" id="image" name="image" required="required" class="form-control col-md-7 col-xs-12">
                      <label class="col-md-8 text-danger">
                        <?php 
                          if($this->session->flashdata('error'))
                          {
                            echo $this->session->flashdata('error');
                          }
                        ?>
                      </label>
                    </div>
                  </div>
                <div class="ln_solid"></div>
                <div class="form-group">
                  <div class="col-md-7 col-sm-7 col-xs-12 col-md-offset-3">
                    <button type="submit" class="btn btn-success">Submit</button>
                  </div>
                </div>
              </div>
              <div class="col-md-3 col-sm-3">

                 <img height="200" width="200" src="<?php echo base_url('assets/images/products').'/'.$product['product_img']?>">
              </div>
              <?php echo form_close();?>
              <button type="submit" class="btn btn-primary " onclick="window.location='<?php echo base_url('index.php/admin_products/index').'/0'; ?>'"><i class="fa fa-backward">  Back</i></button>
                </div>
              </div>
            </div>
          </div>
      </div>

  <div id="custom_notifications" class="custom-notifications dsp_none">
    <ul class="list-unstyled notifications clearfix" data-tabbed_notifications="notif-group">
    </ul>
    <div class="clearfix"></div>
    <div id="notif-group" class="tabbed_notifications"></div>
  </div>
  
  <!-- tags -->
  <script src="<?php echo base_url('assets/js/tags/jquery.tagsinput.min.js')?>"></script>
  <!-- switchery -->
  <script src="<?php echo base_url('assets/js/switchery/switchery.min.js')?>"></script>
  <!-- daterangepicker -->
  <!-- select2 -->
  <script src="<?php echo base_url('assets/js/select/select2.full.js')?>"></script>
  <!-- form validation -->
  <script type="text/javascript" src="<?php echo base_url('assets/js/parsley/parsley.min.js')?>"></script>
  <!-- textarea resize -->
  <script src="<?php echo base_url('assets/js/textarea/autosize.min.js')?>"></script>
  <script>
    autosize($('.resizable_textarea'));
  </script>
  <!-- Autocomplete -->
  <script type="text/javascript" src="<?php echo base_url('assets/js/autocomplete/countries.js')?>"></script>
  <script src="<?php echo base_url('assets/js/autocomplete/jquery.autocomplete.js')?>"></script>
  <!-- pace -->
  <script src="<?php echo base_url('assets/js/pace/pace.min.js')?>"></script>
  <script type="text/javascript">
    $(function() {
      'use strict';
      var countriesArray = $.map(countries, function(value, key) {
        return {
          value: value,
          data: key
        };
      });
      // Initialize autocomplete with custom appendTo:
      $('#autocomplete-custom-append').autocomplete({
        lookup: countriesArray,
        appendTo: '#autocomplete-container'
      });
    });
  </script>
  <script src="<?php echo base_url('assets/js/custom.js');?>"></script>


  <!-- select2 -->
  <script>
    $(document).ready(function() {
      $(".select2_single").select2({
        placeholder: "Select a state",
        allowClear: true
      });
      $(".select2_group").select2({});
      $(".select2_multiple").select2({
        maximumSelectionLength: 4,
        placeholder: "With Max Selection limit 4",
        allowClear: true
      });
    });
  </script>
  <!-- /select2 -->
  <!-- input tags -->
  <script>
    function onAddTag(tag) {
      alert("Added a tag: " + tag);
    }

    function onRemoveTag(tag) {
      alert("Removed a tag: " + tag);
    }

    function onChangeTag(input, tag) {
      alert("Changed a tag: " + tag);
    }

    $(function() {
      $('#tags_1').tagsInput({
        width: 'auto'
      });
    });
  </script>
  <!-- /input tags -->
  <!-- form validation -->
  <script type="text/javascript">
    $(document).ready(function() {
      $.listen('parsley:field:validate', function() {
        validateFront();
      });
      $('#demo-form .btn').on('click', function() {
        $('#demo-form').parsley().validate();
        validateFront();
      });
      var validateFront = function() {
        if (true === $('#demo-form').parsley().isValid()) {
          $('.bs-callout-info').removeClass('hidden');
          $('.bs-callout-warning').addClass('hidden');
        } else {
          $('.bs-callout-info').addClass('hidden');
          $('.bs-callout-warning').removeClass('hidden');
        }
      };
    });

    $(document).ready(function() {
      $.listen('parsley:field:validate', function() {
        validateFront();
      });
      $('#demo-form2 .btn').on('click', function() {
        $('#demo-form2').parsley().validate();
        validateFront();
      });
      var validateFront = function() {
        if (true === $('#demo-form2').parsley().isValid()) {
          $('.bs-callout-info').removeClass('hidden');
          $('.bs-callout-warning').addClass('hidden');
        } else {
          $('.bs-callout-info').addClass('hidden');
          $('.bs-callout-warning').removeClass('hidden');
        }
      };
    });
    try {
      hljs.initHighlightingOnLoad();
    } catch (err) {}
  </script>
  <!-- /form validation -->
  <!-- editor -->
  <script>
    $(document).ready(function() {
      $('.xcxc').click(function() {
        $('#descr').val($('#editor').html());
      });
    });

    $(function() {
      function initToolbarBootstrapBindings() {
        var fonts = ['Serif', 'Sans', 'Arial', 'Arial Black', 'Courier',
            'Courier New', 'Comic Sans MS', 'Helvetica', 'Impact', 'Lucida Grande', 'Lucida Sans', 'Tahoma', 'Times',
            'Times New Roman', 'Verdana'
          ],
          fontTarget = $('[title=Font]').siblings('.dropdown-menu');
        $.each(fonts, function(idx, fontName) {
          fontTarget.append($('<li><a data-edit="fontName ' + fontName + '" style="font-family:\'' + fontName + '\'">' + fontName + '</a></li>'));
        });
        $('a[title]').tooltip({
          container: 'body'
        });
        $('.dropdown-menu input').click(function() {
            return false;
          })
          .change(function() {
            $(this).parent('.dropdown-menu').siblings('.dropdown-toggle').dropdown('toggle');
          })
          .keydown('esc', function() {
            this.value = '';
            $(this).change();
          });

        $('[data-role=magic-overlay]').each(function() {
          var overlay = $(this),
            target = $(overlay.data('target'));
          overlay.css('opacity', 0).css('position', 'absolute').offset(target.offset()).width(target.outerWidth()).height(target.outerHeight());
        });
        if ("onwebkitspeechchange" in document.createElement("input")) {
          var editorOffset = $('#editor').offset();
          $('#voiceBtn').css('position', 'absolute').offset({
            top: editorOffset.top,
            left: editorOffset.left + $('#editor').innerWidth() - 35
          });
        } else {
          $('#voiceBtn').hide();
        }
      };

      function showErrorAlert(reason, detail) {
        var msg = '';
        if (reason === 'unsupported-file-type') {
          msg = "Unsupported format " + detail;
        } else {
          console.log("error uploading file", reason, detail);
        }
        $('<div class="alert"> <button type="button" class="close" data-dismiss="alert">&times;</button>' +
          '<strong>File upload error</strong> ' + msg + ' </div>').prependTo('#alerts');
      };
      initToolbarBootstrapBindings();
      $('#editor').wysiwyg({
        fileUploadError: showErrorAlert
      });
      window.prettyPrint && prettyPrint();
    });
  </script>
  <!-- /editor -->
</body>

</html>
