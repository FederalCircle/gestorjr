package br.acme.location;
import br.acme.users.Motorista;
import br.acme.users.Solicitante;;

public class Viagem {
	// Atributos ----------------------------------------------------------------------------------------------------
	//static atributo pertence a classe entao ele ja incrementa todos os id's
	private static long idIncrement=0;
	private long id;
	private Solicitante cliente;
	private Motorista motorista;
	private Lugar origem;
	private Lugar destino;
	private double valorViagem;
	private String formaPagamento;
	
	// Construtor ----------------------------------------------------------------------------------------------------
	public Viagem(Solicitante cliente, Motorista motorista, Lugar origem, Lugar destino, double valorViagem, String formaPagamento) {
		//static id ++ para o proximo objeto
		Viagem.idIncrement++;
		//id = Ao static id atual
		this.id = Viagem.idIncrement;
		this.cliente = cliente;
		this.motorista = motorista;
		this.origem = origem;
		this.destino = destino;
		this.valorViagem = valorViagem;
		this.formaPagamento = formaPagamento;
	}

	// Getters and Setters ----------------------------------------------------------------------------------------------------
	public long getId() {
		return id;
	}

	public void setId(long id) {
		this.id = id;
	}

	public Solicitante getCliente() {
		return cliente;
	}

	public void setCliente(Solicitante cliente) {
		this.cliente = cliente;
	}

	public Motorista getMotorista() {
		return motorista;
	}

	public void setMotorista(Motorista motorista) {
		this.motorista = motorista;
	}

	public Lugar getOrigem() {
		return origem;
	}

	public void setOrigem(Lugar origem) {
		this.origem = origem;
	}

	public Lugar getDestino() {
		return destino;
	}

	public void setDestino(Lugar destino) {
		this.destino = destino;
	}

	public double getValorViagem() {
		return valorViagem;
	}

	public void setValorViagem(double valorViagem) {
		this.valorViagem = valorViagem;
	}

	public String getFormaPagamento() {
		return formaPagamento;
	}

	public void setFormaPagamento(String formaPagamento) {
		this.formaPagamento = formaPagamento;
	}
	
	//metodos--------------------------------------------------------------------------------------------
	
	public String toString(){
		return "ID: "+this.id+";"+"Valor da viagem: "
				+this.valorViagem+";Forma de Pagamento: "+this.formaPagamento+";";
	}
	
}
