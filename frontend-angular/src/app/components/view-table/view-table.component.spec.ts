import { ComponentFixture, TestBed } from '@angular/core/testing';

import { ViewTableComponent } from './view-table.component';

describe('ViewTableComponent', () => {
  let component: ViewTableComponent;
  let fixture: ComponentFixture<ViewTableComponent>;

  beforeEach(async () => {
    await TestBed.configureTestingModule({
      imports: [ViewTableComponent]
    })
    .compileComponents();

    fixture = TestBed.createComponent(ViewTableComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
