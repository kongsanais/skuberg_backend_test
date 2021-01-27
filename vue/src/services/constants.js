//////////////// Localization Begin ////////////////
export const NETWORK_CONNECTION_MESSAGE = "Cannot connect to server, Please try again.";
export const NETWORK_TIMEOUT_MESSAGE = "A network timeout has occurred, Please try again.";
export const UPLOAD_PHOTO_FAIL_MESSAGE = "An error has occurred. The photo was unable to upload.";
export const NOT_CONNECT_NETWORK = "NOT_CONNECT_NETWORK";

export const apiUrl = "http://127.0.0.1:8000";

export const user = {
  register_user : 'api/register_user',
  login_user : 'api/login',
  get_user_list : 'api/user_list',
  get_user_wallet_and_crytro : 'api/get_user_wallet_and_crytro',
  trade_crytro : 'api/trade_add_sale',
  add_buy_list : 'api/trade_add_buy',
  get_sale_list: 'api/get_sale_list',
  get_buy_list: 'api/get_buy_list',
  action_buy   : 'api/action_buy',
  action_sale  : 'api/action_sale'
}

