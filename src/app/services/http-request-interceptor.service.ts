import { Injectable } from '@angular/core';
import {HttpEvent, HttpInterceptor, HttpHandler, HttpRequest, HttpHeaders} from '@angular/common/http';
import { Observable } from 'rxjs';

@Injectable()
export class HttpRequestInterceptor implements HttpInterceptor {

  intercept(req: HttpRequest<any>, next: HttpHandler):
    Observable<HttpEvent<any>> {

    /*const token = JSON.parse(localStorage.getItem('currentUser')).token;
    let changedRequest = req;
    // HttpHeader object immutable - copy values
    const headerSettings: {[name: string]: string | string[]; } = {};

    for (const key of req.headers.keys()) {
      headerSettings[key] = req.headers.getAll(key);
    }
    if (token) {
      headerSettings['Authorization'] = 'Bearer ' + token;
    }
    headerSettings['Content-Type'] = 'application/json';
    const newHeader = new HttpHeaders(headerSettings);

    changedRequest = req.clone({
      headers: newHeader});
    return next.handle(changedRequest);*/

    const headerSettings: {[name: string]: string | string[]; } = {};

    for (const key of req.headers.keys()) {
      headerSettings[key] = req.headers.getAll(key);
    }

    /*if (!AppComponent.formDataHttp)
      headerSettings['Content-Type'] = 'application/x-www-form-urlencoded';*/

    /*if (JSON.parse(localStorage.getItem('currentUser')) != null)
      headerSettings['Authorization'] = 'Bearer ' + JSON.parse(localStorage.getItem('currentUser')).token;*/

    headerSettings.Accept = 'application/json';
    const newHeader = new HttpHeaders(headerSettings);

    req = req.clone({
      headers: newHeader,
      withCredentials: true,
    });

    return next.handle(req);
  }
}
