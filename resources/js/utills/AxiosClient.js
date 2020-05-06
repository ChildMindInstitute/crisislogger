import axios from "axios";
import {attach as raxAttach, getConfig as raxConfig} from 'retry-axios';
class AxiosClient {
    constructor() {
        const BASE_URL_API = process.env.MIX_APP_URL;
        this.session = axios.create({
            baseURL: BASE_URL_API,
            headers: {
                // 'Authorization': 'Bearer ' + Database.getUserJwtToken(),
                'Accept': 'application/json'
            },
        });
        this.session.defaults.timeout = 30 * 1000;
        this.session.defaults.validateStatus = (status) => (status >= 200 && status < 300);
        this.session.defaults.raxConfig = {
            instance: this.session,
            retry: 3,
            noResponseRetries: 3,
            httpMethodsToRetry: ['GET', 'HEAD', 'OPTIONS', 'DELETE', 'PUT', 'POST'],
            retryDelay: 500,
            httpStatusCodesToRetry: [[100, 199], [420, 429], [500, 599]],
            statusCodesToRetry: [[100, 199], [429, 429], [500, 599]],
            onRetryAttempt: (err) => {
                if (axios.defaults.timeout < 8000)
                    axios.defaults.timeout = axios.defaults.timeout + 500;
                const cfg = raxConfig(err);
            },
        };
        raxAttach(this.session);
        this.session.interceptors.response.use(
            response => {
                return response;
            },
            error => {

                return Promise.reject(error);
            }
        );
        this.session.interceptors.request.use(request => {
            return request;
        });
    }
}
export default AxiosClient;
