import { Routes } from '@angular/router';
import { LoginComponent } from './login/login.component';
import { CodesComponent } from './codes/codes.component';
import { authGuard } from './auth/auth.guard';

export const routes: Routes = [
    {
         path: '', redirectTo: '/codes', pathMatch: 'full'
    },
    {
        path: 'login', component: LoginComponent
    },
    {
        path: 'codes', component: CodesComponent, canActivate: [authGuard]
    }
   
];
