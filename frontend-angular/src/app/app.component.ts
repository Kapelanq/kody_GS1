import { Component, ViewEncapsulation } from '@angular/core';
import { NgFor } from '@angular/common';
import { ViewTableComponent } from "./components/view-table/view-table.component";
import { AddProductComponent } from "./components/add-product/add-product.component";

@Component({
  selector: 'app-root',
  standalone: true,
  imports: [
    NgFor,
    ViewTableComponent,
    AddProductComponent
],
  templateUrl: './app.component.html',
  styleUrl: './app.component.scss',
  encapsulation: ViewEncapsulation.None
})
export class AppComponent{
  title = "codesGS1";

}
