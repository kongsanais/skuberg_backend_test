import httpClient from "@/services/httpClient";
import { user } from "@/services/constants";
import router from "@/router";


export const register  = async values  => {
    var result  =  await httpClient.post(user.register_user,values);
    return result;
}

export const login  = async values => {
    var result  =  await httpClient.post(user.login_user,values);
    return result;
}

export const get_user_list  = async () => {
    var result  =  await httpClient.get(user.get_user_list);
    return result;
}


export const get_user_wallet_and_crytro  = async values => {
    var result  =  await httpClient.post(user.get_user_wallet_and_crytro,values);
    return result;
}


export const trade_crytro_add_sale  = async values => {
    var result  =  await httpClient.post(user.trade_crytro,values);
    return result;
}

export const trade_cytro_add_buy = async values =>{
    var result  =  await httpClient.post(user.add_buy_list,values);
    return result;
}



export const get_sale_list  = async () => {
    var result  =  await httpClient.get(user.get_sale_list);
    return result;
}


export const get_buy_list  = async () => {
    var result  =  await httpClient.get(user.get_buy_list);
    return result;
}


export const action_buy  = async values => {
    var result  =  await httpClient.post(user.action_buy,values);
    return result;
}


export const  action_sale  = async values => {
    var result  = await httpClient.post(user.action_sale,values);
    return result;
}



