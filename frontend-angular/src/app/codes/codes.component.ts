import { Component, inject } from '@angular/core';
import { FormsModule } from '@angular/forms';
import { Router } from '@angular/router';
import { AuthService } from '../auth/auth.service';

@Component({
  selector: 'app-codes',
  standalone: true,
  templateUrl: './codes.component.html',
  styleUrl: './codes.component.scss',
  imports:[
    FormsModule,
  ]
})
export class CodesComponent {
  authService = inject(AuthService);
  router = inject(Router);

  public logout()
  {
    this.authService.logout();
    this.router.navigate(['/login']);
  }

  public navigateAddCodes()
  {
    this.router.navigate(['']);
  }


}
