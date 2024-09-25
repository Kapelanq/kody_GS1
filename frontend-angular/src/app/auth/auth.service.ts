import { inject, Injectable } from '@angular/core';
import { HttpClient } from '@angular/common/http';
import { tap } from 'rxjs';
import { Inject } from '@angular/core';

@Injectable({
  providedIn: 'root'
})
export class AuthService {
  httpClient = inject(HttpClient);
  baseUrl = 'http://127.0.0.1:8000';

  login(data: any) {
    return this.httpClient.post(`${this.baseUrl}/login`, data)
      .pipe(tap((result) => {
        localStorage.setItem('authUser', JSON.stringify(result));
      }));
  }

  logout()
  {
    localStorage.removeItem('authUser');
  }

  isLoggedIn()
  {
    return localStorage.getItem('authUser') !== null;
  }

}
