<?php

namespace Monetah\checkout;


class Constants {

    public const ENDPOINT = "https://sandbox.monetah.com/api/public/index.php?route=";

	public const SANDBOX = "sandbox";

	public const LIVE = "live";

	public const OAUTH_TOKEN_URL = "https://sandbox.monetah.com/oauth/public/index.php?route=/token";

	public const PAYMENT_MAKER = "/checkout";

	public const RETRIEVE_PAYMENT = "/payments";

	public const RETRIEVE_TRANSACTION = "/payments/transactions";

	public const REDIRECT_URL = "https://sandbox.monetah.com/middleware";

	public const GATEWAY_PAYMENT_URI = "https://sandbox.monetah.com/middleware/public/index.php?route=payment";
}

?>