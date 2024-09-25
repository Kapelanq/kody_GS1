import { Component } from '@angular/core';
import { FormControl, ReactiveFormsModule} from '@angular/forms';
import { RouterOutlet } from '@angular/router';
import { HttpService } from '../../Services/http.service';



@Component({
  selector: 'app-add-product',
  standalone: true,
  imports: [
    ReactiveFormsModule,
    RouterOutlet
  ],
  templateUrl: './add-product.component.html',
  styleUrl: './add-product.component.scss'
})
export class AddProductComponent {
  constructor(
    private httpService: HttpService,
  ) {
  }

  code = new FormControl();
  codeValue = this.code.value;
   


  onSubmit()
  {
    this.httpService.addCode(this.code.value).subscribe(data =>{
         console.log(data);
       })
  }

}
