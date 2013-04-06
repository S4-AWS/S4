Vagrant::Config.run do |config|
    config.vm.box = "precise32"
    config.vm.forward_port 80, 1234

    config.vm.box_url = "http://files.vagrantup.com/precise32.box"

    config.vm.provision :puppet do |puppet|
        puppet.manifests_path = ".vagrant/puppet/manifests"
        puppet.module_path = ".vagrant/puppet/modules"
        puppet.manifest_file  = "site.pp"
        puppet.options = "--verbose"
    end
end
