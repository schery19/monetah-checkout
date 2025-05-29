<?php

namespace Monetah\checkout;


class Constants {

	public const BASE_URL = "https://monetah.com";

    public const API_ENDPOINT = "/api/public/index.php?route=";

	public const SANDBOX = "sandbox";

	public const LIVE = "live";

	public const OAUTH_TOKEN_URI = "/oauth/public/index.php?route=/token";

	public const PAYMENT_MAKER = "/checkout";

	public const TRANSFERT_MAKER = "/payments/transfer";

	public const RETRIEVE_PAYMENT = "/payments";

	public const RETRIEVE_TRANSACTION = "/payments/transactions";

	public const RETRIEVE_ORDER = "/payments/orders";

	public const REDIRECT_URL = "https://monetah.com/middleware";

	public const GATEWAY_PAYMENT_URI = "https://monetah.com/middleware/public/index.php?route=payment";

	public const SANDBOX_REDIRECT_URL = "https://sandbox.monetah.com/middleware";

	public const SANDBOX_GATEWAY_PAYMENT_URI = "https://sandbox.monetah.com/middleware/public/index.php?route=payment";
}

?>