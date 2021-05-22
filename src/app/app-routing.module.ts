import { NgModule } from '@angular/core';
import { RouterModule, Routes } from '@angular/router';
import { ActualizarNotasComponent } from './pages/actualizar-notas/actualizar-notas.component';
import { ListaNotasComponent } from './pages/lista-notas/lista-notas.component';
import { NotasComponent } from './pages/notas/notas.component';

const routes: Routes = [
  { path: '', component: NotasComponent },
  { path: 'lista-notas', component: ListaNotasComponent}
];

@NgModule({
  imports: [RouterModule.forRoot(routes)],
  exports: [RouterModule]
})
export class AppRoutingModule { }
