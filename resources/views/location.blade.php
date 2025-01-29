{{-- Ini cuma test aja, gausah diotak-atik --}}

<!DOCTYPE html>
<html>
<head>
    <title>Provinces</title>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>
<body>
    <select name="province" id="province">
        <option value="">Select a province</option>
            @foreach ($provinceData['data'] as $province)
                <option value="{{$province['code']}}"> {{$province['name']}}</option>
            @endforeach
    </select>
    <select name="city" id="city">
        <option value="">Select a city</option>
    </select>

    <script>
        $(document).ready(function() {
            $('#province').on('change', function() {
                var provinceId = $(this).val();  // Get selected province ID
                $('#city').prop('disabled', true);  // Disable the city dropdown
                $('#city').empty();  // Clear the current options
                $('#city').append('<option value="">Select a city</option>');  // Default placeholder

                if (provinceId) {
                    $.ajax({
                        url: "{{ route('get.cities') }}",  // Make sure this route is correct
                        type: "POST",
                        data: {
                            _token: "{{ csrf_token() }}",  // Include the CSRF token
                            province_code: provinceId  // Send the selected province code
                        },
                        success: function(response) {
                            $('#city').prop('disabled', false);  // Enable the city dropdown
                            if (response.data) {
                            $.each(response.data, function(key, city) {
                                $('#city').append('<option value="' + city.code + '">' + city.name + '</option>');
                                });
                            } else {
                                alert('No cities found.');
                            }
                        },
                        error: function() {
                            alert('Unable to fetch cities.');
                        }
                    });
                }
            });
        });

    </script>
</body>
</html>