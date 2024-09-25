import { Injectable } from '@angular/core';
import { HttpClient } from '@angular/common/http';
import { Observable } from 'rxjs';
import { Product } from '../DataModels/Product';

@Injectable({
  providedIn: 'root'
  
})
export class HttpService {

  constructor(private http: HttpClient) { }
  //url do połączenia z backendem
  url = 'http://127.0.0.1:8000/codes';


  getData(): Observable<Product>
  {
     return this.http.get<Product>(this.url);
  }

  addCode(code: string): Observable<any>
  {
    const headers = {'content-type': 'application/json'};
    console.log(code);
    return this.http.post(this.url, code, {'headers': headers});
  }

}
