var stripe = Stripe('pk_test_51HYt4OHyxLf6cTTTBRJ5FJGzdiJ8syzy77VuWZ4Z44ioWp8Wud8mCwOSMAuzR4dKyPeEjYU9WYID2wf8Q1iPNo7x00LU5kMrNS');

var $form = $('#checkout-form');
$form.submit(function(event)
	{
		$('charge-error').addClass('hidden');
		$form.find('button').prop('disabled', true);
		Stripe.card.createToken({
	number: $('#card-num').val(),
	cvc: $('#card-cvc').val(),
	exp_month: $('#card-exp-mo').val(),
	exp_year: $('#card-exp-year').val(),
	name: $('#card-name').val()
	}, stripeResponseHandler);
		return false;
	});

function stripeResponseHandler(status, response)
{
	if(response.error)
	{
		$('charge-error').removeClass('hidden');
		$('charge-error').text(response.error.message);
		$form.find('button').prop('disabled', true);
	}
	else
	{
		var token = response.id;
		$form.append($('<input type="hidden" name="stripeToken" />').val(token));
		$form.get(0).submit();
	}
}