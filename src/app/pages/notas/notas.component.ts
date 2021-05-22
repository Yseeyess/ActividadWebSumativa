import { Component, OnInit } from '@angular/core';
import { AbstractControl, FormBuilder, FormGroup, Validators } from '@angular/forms';
import { ServicioNotaService } from 'src/app/servicio-nota.service';
import { Nota } from '../../nota';

@Component({
  selector: 'app-notas',
  templateUrl: './notas.component.html',
  styleUrls: ['./notas.component.scss']
})
export class NotasComponent implements OnInit {

  titulo:AbstractControl;
  estado:AbstractControl;
  descripcion:AbstractControl;

  listaInicio:Array<Nota> = [];
  listaProceso:Array<Nota> = [];
  listaTerminado:Array<Nota> = [];

  form: FormGroup;
  inicio: any;
  nota: Nota | undefined;

  constructor(public fb: FormBuilder, private servicio:ServicioNotaService) {
    this.form = this.fb.group({
      titulo:["",[Validators.required]],
      estado:["",[Validators.required]],
      descripcion:["",[Validators.required]]
    });

    this.titulo = this.form.controls["titulo"];
    this.estado = this.form.controls["estado"];
    this.descripcion = this.form.controls["descripcion"];
  }

  ngOnInit(): void {
    
  }

  crear(){
    let lista:Array<Nota>=[{
      titulo:this.form.get("titulo")?.value,
      estado:this.form.get("estado")?.value,
      descripcion:this.form.get("descripcion")?.value
    }];

    this.servicio.guardar(lista).subscribe(datos=>{

    });
  }
}
