package br.acme.tests;
import br.acme.users.*;
import java.util.Date;

public class TesteSolicitante {
	
	public static void main(String[] args) {
		Date dataNascimento = new Date();
		
		// Criando um solicitante ----------------------------------------------------------------------------------------------------
		Solicitante userPaula = new Solicitante("111.111.111-11", "paula@user.com", "123", "Paula", "Feminino", dataNascimento, 912345678);
		
		// Exibindo as informações ----------------------------------------------------------------------------------------------------
		System.out.println("Informações do usuário..."
				+ "\nID: "+ userPaula.getId()
				+ "\nNome: "+ userPaula.getNome()
				+ "\nSenha: "+ userPaula.getSenha()
				+ "\nCPF: "+ userPaula.getCpf()
				+ "\nE-mail: "+ userPaula.getEmail()
				+ "\nCelular: "+ userPaula.getNumeroCelular()
				+ "\nSexo: "+ userPaula.getSexo()
				+ "\nData de nascimento: "+ userPaula.getDataNascimento());
		
		// Alterando as informações ----------------------------------------------------------------------------------------------------
		userPaula.setNome(userPaula.getNome()+" Fernandes");
		userPaula.setSenha("abc");
		userPaula.setCpf("222.222.222-22");
		userPaula.setEmail("paula_tejando@user.com");
		userPaula.setNumeroCelular(988776655);
		userPaula.setSexo("Feminino^2");
		
		// Exibindo as informações ----------------------------------------------------------------------------------------------------
				System.out.println("\nInformações do usuário..."
						+ "\nID: "+ userPaula.getId()
						+ "\nNome: "+ userPaula.getNome()
						+ "\nSenha: "+ userPaula.getSenha()
						+ "\nCPF: "+ userPaula.getCpf()
						+ "\nE-mail: "+ userPaula.getEmail()
						+ "\nCelular: "+ userPaula.getNumeroCelular()
						+ "\nSexo: "+ userPaula.getSexo()
						+ "\nData de nascimento: "+ userPaula.getDataNascimento());
	}
}
