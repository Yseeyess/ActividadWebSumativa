import { ComponentFixture, TestBed } from '@angular/core/testing';

import { ActualizarNotasComponent } from './actualizar-notas.component';

describe('ActualizarNotasComponent', () => {
  let component: ActualizarNotasComponent;
  let fixture: ComponentFixture<ActualizarNotasComponent>;

  beforeEach(async () => {
    await TestBed.configureTestingModule({
      declarations: [ ActualizarNotasComponent ]
    })
    .compileComponents();
  });

  beforeEach(() => {
    fixture = TestBed.createComponent(ActualizarNotasComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
