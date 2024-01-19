<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User ID</title>
    
    <link rel="stylesheet" href="{{ asset('css/bootstrap5.css') }}">
    <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
    <style>
      table, th, td{
        border: 1px solid black;
        border-collapse: collapse;
      }
    </style>
</head>
<body>
    <h1>
      {{-- @dd($data); --}}
    </h1>
    <div class="container-md">
      
        <div class="row">
            <div class="col-8 col-md-4 justify-content-center text-center mx-auto p-5">
                <h2>
                    Currency Converter
                </h2>
                <form autocomplete="off" id="form_converter" method="post">
                    
                            <!-- Left currency-->
                            <div class="form-floating mb-3">
                                <select name="left_currency" id="left_currency" class="form-control form-select display_currencies" aria-placeholder="Select Currency" required>
                                </select>                            
                                <label for="left_currency">Convert from: </label>
                            </div>

                            <!-- Right currency-->
                            <div class="form-floating mb-3">
                                <select name="right_currency" id="right_currency" class="form-control form-select display_currencies" aria-placeholder="Select Currency" required>
                                </select>                            
                                <label for="right_currency">Convert to:</label>
                            </div>
                            
                              <div class="input-group mb-3">
                                <span class="input-group-text">Amount:</span>
                                <input type="number" id="conversion_amount" class="form-control" value="1.00">
                              </div>

                            <div id="conversion_output" class="alert alert-info" style="display: none;">
                            </div>

                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary" name="convert">Convert</button>
                </form>
          </div>
        </div>
      </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
    <script src="{{ asset('js/jquery.js') }}"></script>
    <script src="{{ asset('js/script.js') }}"></script>
    
</body>
</html>