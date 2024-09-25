import { Component, ViewChild } from '@angular/core';
import { NgFor } from '@angular/common';
import { HttpService } from '../../Services/http.service';
import * as data from '../../DataModels/Product';
import {Sort, MatSortModule} from '@angular/material/sort';

@Component({
  selector: 'app-view-table',
  standalone: true,
  imports: [
    NgFor,
    MatSortModule,
  ],
  templateUrl: './view-table.component.html',
  styleUrl: './view-table.component.scss'
})

export class ViewTableComponent {
  product: any = (data as any).default;

  sortedData:any;

  constructor(
    private httpService: HttpService,
  ) {
    
  }

  sortData(sort: Sort) {
    const data = this.product.slice();
    console.log(data);
    if (!sort.active || sort.direction === '') {
      this.product = data;
      return;
    }

    this.sortedData = data.sort((a:any, b:any) => {
      const isAsc = sort.direction === 'asc';
      switch (sort.active) {
        case 'id':
          return this.compare(a.id, b.id, isAsc);
        case 'code':
          return this.compare(a.code, b.code, isAsc);
        case 'brandName':
          return this.compare(a.brandName, b.brandName, isAsc);
        default:
          return 0;
      }
    });
  }

  compare(a: number | string, b: number | string, isAsc: boolean) {
    return (a < b ? -1 : 1) * (isAsc ? 1 : -1);
  }


  ngOnInit()
  {
      this.httpService.getData().subscribe((data) =>{
      this.product = data;
      this.sortedData = this.product;
    })

  }
  
}
