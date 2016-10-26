package br.acme.users;
import br.acme.storage.RepositorioViagem;

public class Motorista extends Usuario {
	// Atributos ----------------------------------------------------------------------------------------------------
	private boolean disponivel;
	private RepositorioViagem viagens = new RepositorioViagem();
	
	// Construtor ----------------------------------------------------------------------------------------------------
	public Motorista(String cpf, String nome, String senha, String email, String sexo, boolean disponivel) {
		// Contrutor da superClasse
		super(cpf,nome,senha,email,sexo);
		this.disponivel = true;
	}

	// Getters and Setters ----------------------------------------------------------------------------------------------------
	public boolean getDisponivel() {
		return disponivel;
	}

	public void setDisponivel(boolean disponivel) {
		this.disponivel = disponivel;
	}

	public RepositorioViagem getViagens() {
		return viagens;
	}

	public void setViagens(RepositorioViagem viagens) {
		this.viagens = viagens;
	}

	// Métodos ----------------------------------------------------------------------------------------------------
	public void responderPedido(){
		this.disponivel= false;
		
		System.out.println(this.getNome()+" aceitou sua viagem (disponibilidade = "+this.disponivel+")");
	}
	
	public void historico(){
		
	}
	
	public String toString(){
		return super.toString()+"Status: "+this.disponivel;
	}
}
