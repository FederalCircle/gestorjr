package br.acme.tests;

import java.util.Date;

import br.acme.users.Solicitante;
import br.acme.storage.RepositorioSolicitante;

public class TesteRepositorioSolicitante {

	public static void main(String[] args) {
		Date dataNascimento = new Date();
		
		// Criando os solicitantes ----------------------------------------------------------------------------------------------------
		Solicitante userPaula = new Solicitante("111.111.111-11", "paula@user.com", "123", "Paula", "Feminino", dataNascimento, 99112233);
		Solicitante userPedro = new Solicitante("222.222.222-22", "pedro@user.com", "abc", "Pedro", "Masculino", dataNascimento, 99887755);
		Solicitante userAndre = new Solicitante("333.333.333-33", "andre@user.com", "321", "André", "Masculino", dataNascimento, 99332211);
		
		// Criando o repositório ----------------------------------------------------------------------------------------------------
		RepositorioSolicitante repositorio = new RepositorioSolicitante();
		
		// Adicionando os solicitantes ao repositorio ----------------------------------------------------------------------------------------------------
		repositorio.adicionar(userPaula);
		repositorio.adicionar(userPedro);
		repositorio.adicionar(userAndre);
		
		System.out.println("ID\t\tNome\t\tEmail");
		for(Solicitante user: repositorio.getListaSolicitante()){
			if(user==null)break;
			System.out.println("#"+user.getId()+"\t\t"+user.getNome()+"\t\t"+user.getEmail());
		}
		System.out.println();
		
		// Removendo os solicitantes do repositorio ----------------------------------------------------------------------------------------------------
		repositorio.remover(2); // Solicitante existe
		repositorio.remover(5); // Solicitante não existe
		
		System.out.println("ID\t\tNome\t\tEmail");
		for(Solicitante user: repositorio.getListaSolicitante()){
			if(user==null)break;
			System.out.println("#"+user.getId()+"\t\t"+user.getNome()+"\t\t"+user.getEmail());
		}
		System.out.println();
		
		// Alterando solicitantes do repositorio ----------------------------------------------------------------------------------------------------
		repositorio.alterar(5, userPedro);// Solicitante não existe
		repositorio.alterar(3, userPedro);// Solicitante existe
		
		System.out.println("ID\t\tNome\t\tEmail");
		for(Solicitante user: repositorio.getListaSolicitante()){
			if(user==null)break;
			System.out.println("#"+user.getId()+"\t\t"+user.getNome()+"\t\t"+user.getEmail());
		}
		System.out.println();
		
		// Buscando um solicitante ----------------------------------------------------------------------------------------------------
		System.out.println("O solicitante #2 é: "+repositorio.buscar(2).getNome()+"("+repositorio.buscar(2).getEmail()+")\n");
		
		// Retornando a lista de solicitantes ----------------------------------------------------------------------------------------------------
		Solicitante[] lista = repositorio.buscarTodos();
		
		System.out.println("ID\t\tNome\t\tEmail");
		for(Solicitante user: lista){
			if(user==null)break;
			System.out.println("#"+user.getId()+"\t\t"+user.getNome()+"\t\t"+user.getEmail());
		}
		System.out.println();
		System.out.println(userPaula.toString());	
	}

}
