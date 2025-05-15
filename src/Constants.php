<?php

namespace Monetah\checkout;


class Constants {

    const ENDPOINT = "https://sandbox.monetah.com/api/public/index.php?route=";

	const SANDBOX = "sandbox";

	const LIVE = "live";

	const OAUTH_TOKEN_URL = "https://sandbox.monetah.com/oauth/public/index.php?route=/token";

	const PAYMENT_MAKER = "/checkout";

	const RETRIEVE_PAYMENT = "/payments";

	const RETRIEVE_TRANSACTION = "/payments/transactions";

	const REDIRECT_URL = "https://sandbox.monetah.com/middleware";

	const GATEWAY_PAYMENT_URI = "https://sandbox.monetah.com/middleware/public/index.php?route=payment";
}

?>